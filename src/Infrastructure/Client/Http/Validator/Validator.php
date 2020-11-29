<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Validator;

use Tui\Musement\ApiClient\Domain\Shared\Exception\MalformedDeserializationException;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Normalizer\CamelCaseToSnakeCaseNormalizerInterface;

class Validator implements ValidatorInterface
{
    public function array_keys_exist(
        CamelCaseToSnakeCaseNormalizerInterface $normalizer,
        array $keysToValidate,
        array $validKeys
    ): void {
        $normalizedValidKeys = $normalizer->normalize($validKeys);
        $intersection = array_intersect($keysToValidate, $normalizedValidKeys);

        if (count($intersection) !== count($keysToValidate)) {
            throw new MalformedDeserializationException();
        }
    }
}
