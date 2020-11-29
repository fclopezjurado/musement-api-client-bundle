<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpClient\HttplugClient;
use Symfony\Component\HttpFoundation\Request;
use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer\DenormalizerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Deserializer\DeserializerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors\CityVisitorInterface;

class HttpClient extends AbstractHttpClient
{
    /**
     * @var array<string, string>
     */
    protected $apiConfiguration;

    /**
     * @var DeserializerInterface
     */
    protected $deserializer;

    /**
     * @var DenormalizerInterface
     */
    protected $denormalizer;

    /**
     * @var CityVisitorInterface
     */
    protected $cityVisitor;

    /**
     * HttpClient constructor.
     *
     * @param DeserializerInterface $deserializer
     * @param DenormalizerInterface $denormalizer
     * @param CityVisitorInterface  $cityVisitor
     * @param array<string, string> $apiConfiguration
     * @param array<string, string> $requestsHeaders
     */
    public function __construct(
        DeserializerInterface $deserializer,
        DenormalizerInterface $denormalizer,
        CityVisitorInterface $cityVisitor,
        array $apiConfiguration,
        array $requestsHeaders
    ) {
        $this->deserializer = $deserializer;
        $this->denormalizer = $denormalizer;
        $this->cityVisitor = $cityVisitor;
        $this->apiConfiguration = $apiConfiguration;
        $this->headers = $requestsHeaders;
        $this->client = new HttplugClient();
    }

    /**
     * @throws \Exception
     *
     * @return AbstractEntity[]
     */
    public function getCities(): array
    {
        $uri = sprintf(
            '%s/%s%s',
            $this->apiConfiguration['base_url'],
            $this->apiConfiguration['version'],
            $this->apiConfiguration['cities_endpoint']
        );

        /** @var array[] $response */
        $response = $this->sendRequest(Request::METHOD_GET, $uri);

        return array_map(function ($cityData) {
            return $this->denormalizer->accept($this->cityVisitor, $cityData);
        }, $response);
    }

    /**
     * @param string $method
     * @param string $uri
     *
     * @throws \Exception
     *
     * @return array<string, float|int|string|array|null>
     */
    protected function sendRequest(string $method, string $uri): array
    {
        $response = $this->request(
            $method,
            $uri,
            function (ResponseInterface $response) {
                return $response;
            },
            function (\Throwable $exception) {
                throw $exception;
            }
        );

        return $this->deserializer->deserialize($response->getBody()->getContents());
    }
}
