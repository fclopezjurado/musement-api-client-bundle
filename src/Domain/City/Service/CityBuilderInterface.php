<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Domain\City\Service;

use Tui\Musement\ApiClient\Domain\City\Model\City;
use Tui\Musement\ApiClient\Domain\Country\Model\Country;

interface CityBuilderInterface
{
    /**
     * @param array<string, array|float|int|string|Country|null> $data
     *
     * @return $this
     */
    public function fromArray(array $data): self;

    public function build(): City;

    /**
     * @return array<string, array|float|int|string|Country|null>
     */
    public function toArray(): array;
}
