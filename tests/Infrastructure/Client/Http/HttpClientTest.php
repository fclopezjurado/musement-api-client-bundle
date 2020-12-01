<?php

namespace Tui\Musement\ApiClient\Tests\Infrastructure\Client\Http;

use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Message\ResponseInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Response;
use Tui\Musement\ApiClient\Infrastructure\Client\Exception\BadGatewayException;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer\DenormalizerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Deserializer\DeserializerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\HttpClient;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors\CityVisitorInterface;

class HttpClientTest extends KernelTestCase
{
    public function testShouldThrowExceptionWhenGetCities(): void
    {
        $this->expectException(\Exception::class);

        /** @var HttpClient $client */
        $client = $this->getHttpClientMock();

        $client->getCities();
    }

    public function testShouldThrowBadGatewayExceptionWhenGetCities(): void
    {
        $this->expectException(BadGatewayException::class);

        $responseMock = $this->getResponseMock(Response::HTTP_NOT_FOUND);
        /** @var HttpClient $client */
        $client = $this->getHttpClientMock($responseMock);

        $client->getCities();
    }

    protected function getHttpClientMock(MockObject $responseMock = null): MockObject
    {
        $mocks = [
            'deserializerMock' => $this->createMock(DeserializerInterface::class),
            'denormalizerMock' => $this->createMock(DenormalizerInterface::class),
            'cityVisitorMock' => $this->createMock(CityVisitorInterface::class),
            'apiConfigurationMock' => $this->getApiConfigurationDataMock(),
            'requestHeadersMock' => [],
        ];
        $httpClientMock = $this->getMockBuilder(HttpClient::class)
            ->setConstructorArgs($mocks)
            ->onlyMethods(['request'])
            ->getMock();
        $invocationMocker = $httpClientMock->expects($this->any())
            ->method('request');

        if (null === $responseMock) {
            $invocationMocker->willThrowException(new \Exception());
            return $httpClientMock;
        }

        $invocationMocker->willReturn($responseMock);

        return $httpClientMock;
    }

    protected function getResponseMock(int $responseCode): MockObject
    {
        $mock = $this->createMock(ResponseInterface::class);

        $mock->method('getStatusCode')
            ->willReturn($responseCode);

        return $mock;
    }

    protected function getApiConfigurationDataMock(): array
    {
        return [
            'base_url' => '',
            'version' => '',
            'cities_endpoint' => '',
        ];
    }
}
