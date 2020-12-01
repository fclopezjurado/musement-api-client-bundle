<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpClient\HttplugClient;

abstract class AbstractHttpClient
{
    /**
     * @var array<string, string>
     */
    protected $headers;

    /**
     * @var HttplugClient
     */
    protected $client;

    /**
     * @param string   $method
     * @param string   $uri
     * @param callable $onFullFilled
     * @param callable $onRejected
     *
     * @throws \Exception
     *
     * @return ResponseInterface
     */
    protected function request(
        string $method,
        string $uri,
        callable $onFullFilled,
        callable $onRejected
    ): ResponseInterface {
        $request = $this->client->createRequest($method, $uri, $this->headers);
        $promise = $this->client->sendAsyncRequest($request)
            ->then($onFullFilled, $onRejected)
        ;

        return $promise->wait();
    }
}
