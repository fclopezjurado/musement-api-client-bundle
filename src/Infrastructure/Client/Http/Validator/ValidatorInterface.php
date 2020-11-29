<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Validator;

use Tui\Musement\ApiClient\Infrastructure\Client\Http\Normalizer\CamelCaseToSnakeCaseNormalizerInterface;

interface ValidatorInterface
{
    public function array_keys_exist(
        CamelCaseToSnakeCaseNormalizerInterface $normalizer,
        array $keysToValidate,
        array $validKeys
    ): void;
}
