<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Normalizer;

interface CamelCaseToSnakeCaseNormalizerInterface
{
    public function normalize(array $keys): array;

    public function denormalize(array $normalizedData): array;
}
