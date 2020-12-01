<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Domain\Country\Service;

use Tui\Musement\ApiClient\Domain\Country\Model\Country;

interface CountryBuilderInterface
{
    /**
     * @param array<string, array|float|int|string|null> $data
     *
     * @return $this
     */
    public function fromArray(array $data): self;

    public function build(): Country;

    /**
     * @return array<string, array|float|int|string|null>
     */
    public function toArray(): array;
}
