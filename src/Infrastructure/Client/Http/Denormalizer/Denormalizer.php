<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer;

use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Exception\MalformedDeserializationException;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors\VisitorInterface;

class Denormalizer implements DenormalizerInterface
{
    /**
     * @param VisitorInterface                           $visitor
     * @param array<string, float|int|string|array|null> $normalizedData
     *
     * @throws MalformedDeserializationException
     *
     * @return AbstractEntity
     */
    public function accept(VisitorInterface $visitor, array $normalizedData): AbstractEntity
    {
        return $visitor->denormalize($this, $normalizedData);
    }
}
