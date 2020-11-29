<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Normalizer;

use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter
    as SymfonyCamelCaseToSnakeCaseNameConverter;

class CamelCaseToSnakeCaseNormalizer implements CamelCaseToSnakeCaseNormalizerInterface
{
    protected $normalizer;

    public function __construct()
    {
        $this->normalizer = new SymfonyCamelCaseToSnakeCaseNameConverter();
    }

    /**
     * @param string[] $keys
     * @return string[]
     */
    public function normalize(array $keys): array
    {
        return array_map(function ($key) {
            return $this->normalizer->normalize($key);
        }, $keys);
    }

    /**
     * @param string[] $normalizedData
     * @return string[]
     */
    public function denormalize(array $normalizedData): array
    {
        $denormalizedData = [];

        foreach ($normalizedData as $key => $value) {
            $denormalizedKey = $this->normalizer->denormalize($key);;
            $denormalizedData[$denormalizedKey] = $value;
        }

        return $denormalizedData;
    }
}