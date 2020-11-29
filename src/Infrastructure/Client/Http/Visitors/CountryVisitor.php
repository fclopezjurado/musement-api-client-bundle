<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors;

use Tui\Musement\ApiClient\Domain\Country\Service\CountryBuilderInterface;
use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer\DenormalizerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Normalizer\CamelCaseToSnakeCaseNormalizerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Validator\ValidatorInterface;

class CountryVisitor implements CountryVisitorInterface
{
    protected $countryBuilder;

    protected $validator;

    protected $normalizer;

    public function __construct(
        CountryBuilderInterface $countryBuilder,
        ValidatorInterface $validator,
        CamelCaseToSnakeCaseNormalizerInterface $normalizer
    ) {
        $this->countryBuilder = $countryBuilder;
        $this->validator = $validator;
        $this->normalizer = $normalizer;
    }

    public function denormalize(DenormalizerInterface $denormalizer, array $normalizedData): AbstractEntity
    {
        $validKeys = array_keys($this->countryBuilder->toArray());
        $keysToValidate = array_keys($normalizedData);

        $this->validator->array_keys_exist($this->normalizer, $keysToValidate, $validKeys);

        $denormalizedData = $this->normalizer->denormalize($normalizedData);

        return $this->countryBuilder
            ->fromArray($denormalizedData)
            ->build();
    }
}
