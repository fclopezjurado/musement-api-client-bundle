<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Validator;

use Tui\Musement\ApiClient\Domain\Shared\Exception\MalformedDeserializationException;
use Tui\Musement\ApiClient\Infrastructure\Client\Http\Normalizer\CamelCaseToSnakeCaseNormalizerInterface;

interface ValidatorInterface
{
    /**
     * @param CamelCaseToSnakeCaseNormalizerInterface $normalizer
     * @param string[]                                $keysToValidate
     * @param string[]                                $validKeys
     *
     * @throws MalformedDeserializationException
     */
    public function arrayKeysExist(
        CamelCaseToSnakeCaseNormalizerInterface $normalizer,
        array $keysToValidate,
        array $validKeys
    ): void;
}
