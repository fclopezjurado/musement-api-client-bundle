<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Visitors;

use Tui\Musement\ApiClient\Domain\City\Service\CityBuilderInterface;
use Tui\Musement\ApiClient\Domain\Country\Model\Country;
use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Denormalizer\DenormalizerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Normalizer\CamelCaseToSnakeCaseNormalizerInterface;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Validator\ValidatorInterface;

class CityVisitor implements CityVisitorInterface
{
    /**
     * @var CityBuilderInterface
     */
    protected $cityBuilder;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var CountryVisitorInterface
     */
    protected $countryVisitor;

    /**
     * @var CamelCaseToSnakeCaseNormalizerInterface
     */
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

    /**
     * @param DenormalizerInterface                      $denormalizer
     * @param array<string, float|int|string|array|null> $normalizedData
     *
     * @throws \Tui\Musement\ApiClient\Domain\Shared\Exception\MalformedDeserializationException
     *
     * @return AbstractEntity
     */
    public function denormalize(DenormalizerInterface $denormalizer, array $normalizedData): AbstractEntity
    {
        $validKeys = array_keys($this->cityBuilder->toArray());
        $keysToValidate = array_keys($normalizedData);

        $this->validator->arrayKeysExist($this->normalizer, $keysToValidate, $validKeys);

        /** @var array<string, float|int|string|array|null> $countryData */
        $countryData = $normalizedData['country'];
        /** @var Country $country */
        $country = $denormalizer->accept($this->countryVisitor, $countryData);
        $denormalizedData = $this->normalizer->denormalize($normalizedData);
        $denormalizedData['country'] = $country;

        return $this->cityBuilder
            ->fromArray($denormalizedData)
            ->build()
        ;
    }
}
