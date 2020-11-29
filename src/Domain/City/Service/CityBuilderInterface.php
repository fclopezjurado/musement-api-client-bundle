<?php

namespace Tui\Musement\ApiClient\Domain\City\Service;

use Tui\Musement\ApiClient\Domain\City\Model\City;

interface CityBuilderInterface
{
    public function fromArray(array $data): self;

    public function build(): City;

    public function toArray(): array;
}
