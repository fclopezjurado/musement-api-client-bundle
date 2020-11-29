<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors;

use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer\DenormalizerInterface;

interface VisitorInterface
{
    /**
     * @param DenormalizerInterface                      $denormalizer
     * @param array<string, float|int|string|array|null> $normalizedData
     *
     * @throws \Tui\Musement\ApiClient\Domain\Shared\Exception\MalformedDeserializationException
     *
     * @return AbstractEntity
     */
    public function denormalize(DenormalizerInterface $denormalizer, array $normalizedData): AbstractEntity;
}
