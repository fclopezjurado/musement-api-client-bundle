<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors;

use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer\DenormalizerInterface;

interface CountryVisitorInterface extends VisitorInterface
{
    public function denormalize(DenormalizerInterface $denormalizer, array $normalizedData): AbstractEntity;
}
