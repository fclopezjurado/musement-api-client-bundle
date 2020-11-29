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
        $intersection = array_intersect($validKeys, $keysToValidate);

        if (count($intersection) !== count($validKeys)) {
            throw new MalformedDeserializationException();
        }
    }
}
