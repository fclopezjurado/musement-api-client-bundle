<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors;

use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Exception\MalformedDeserializationException;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer\DenormalizerInterface;

interface CityVisitorInterface extends VisitorInterface
{
    /**
     * @param DenormalizerInterface                      $denormalizer
     * @param array<string, float|int|string|array|null> $normalizedData
     *
     * @throws MalformedDeserializationException
     *
     * @return AbstractEntity
     */
    public function denormalize(DenormalizerInterface $denormalizer, array $normalizedData): AbstractEntity;
}
