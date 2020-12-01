<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Http\Deserializer;

interface DeserializerInterface
{
    /**
     * @param string $content
     *
     * @return array<string, string|int|float|null>
     */
    public function deserialize(string $content): array;
}
