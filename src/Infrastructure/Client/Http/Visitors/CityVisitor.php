<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors;

use Tui\Musement\ApiClient\Domain\City\Service\CityBuilderInterface;
use Tui\Musement\ApiClient\Domain\Country\Model\Country;
use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer\DenormalizerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Normalizer\CamelCaseToSnakeCaseNormalizerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Validator\ValidatorInterface;

class CityVisitor implements CityVisitorInterface
{
    protected $cityBuilder;

    protected $validator;

    protected $countryVisitor;

    protected $normalizer;

    public function __construct(
        CityBuilderInterface $cityBuilder,
        ValidatorInterface $validator,
        CountryVisitorInterface $countryVisitor,
        CamelCaseToSnakeCaseNormalizerInterface $normalizer
    ) {
        $this->cityBuilder = $cityBuilder;
        $this->validator = $validator;
        $this->countryVisitor = $countryVisitor;
        $this->normalizer = $normalizer;
    }

    public function denormalize(DenormalizerInterface $denormalizer, array $normalizedData): AbstractEntity
    {
        $validKeys = array_keys($this->cityBuilder->toArray());
        $keysToValidate = array_keys($normalizedData);

        $this->validator->array_keys_exist($this->normalizer, $keysToValidate, $validKeys);

        /** @var Country $country */
        $country = $denormalizer->accept($this->countryVisitor, $normalizedData['country']);
        $denormalizedData = $this->normalizer->denormalize($normalizedData);
        $denormalizedData['country'] = $country;

        return $this->cityBuilder
            ->fromArray($denormalizedData)
            ->build();
    }
}
