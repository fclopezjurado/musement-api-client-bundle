<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Deserializer;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpClient\HttplugClient;
use Symfony\Component\HttpFoundation\Request;
use Tui\Musement\ApiClient\Domain\Common\Exception\MalformedDeserializationException;

class HttpClient extends AbstractHttpClient
{
    /**
     * HttpClient constructor.
     *
     * @param array<string, string> $apiConfiguration
     * @param array<string, string> $requestHeaders
     */
    public function __construct(array $apiConfiguration, array $requestHeaders)
    {
        $this->apiConfiguration = $apiConfiguration;
        $this->headers = $requestHeaders;
        $this->client = new HttplugClient();
    }

    /**
     * @throws MalformedDeserializationException
     *
     * @return array<string>
     */
    public function getCities(): array
    {
        $uri = sprintf(
            '%s/%s%s',
            $this->apiConfiguration['base_url'],
            $this->apiConfiguration['version'],
            $this->apiConfiguration['cities_endpoint']
        );

        $response = $this->sendRequest(Request::METHOD_GET, $uri);
        var_dump($response);

        return [PHP_EOL];
    }

    /**
     * @param string $method
     * @param string $uri
     *
     * @throws MalformedDeserializationException
     *
     * @return array<string>
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

        $content = json_decode($response->getBody()->getContents(), true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new MalformedDeserializationException(json_last_error_msg());
        }

        return $content;
    }
}
