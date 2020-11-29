<?php

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Deserializer;

interface DeserializerInterface
{
    public function deserialize(string $content): array;
}
