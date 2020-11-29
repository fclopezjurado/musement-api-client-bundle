<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Deserializer;

use Tui\Musement\ApiClient\Domain\Shared\Exception\MalformedDeserializationException;

class Deserializer implements DeserializerInterface
{
    public function deserialize(string $content): array
    {
        $content = json_decode($content, true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new MalformedDeserializationException(json_last_error_msg());
        }

        return $content;
    }
}
