<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer;

use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors\VisitorInterface;

class Denormalizer implements DenormalizerInterface
{
    public function accept(VisitorInterface $visitor, array $normalizedData): AbstractEntity
    {
        return $visitor->denormalize($this, $normalizedData);
    }
}
