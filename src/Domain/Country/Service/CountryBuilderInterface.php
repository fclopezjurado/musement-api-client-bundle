<?php

namespace Tui\Musement\ApiClient\Domain\Country\Service;

use Tui\Musement\ApiClient\Domain\Country\Model\Country;

interface CountryBuilderInterface
{
    public function fromArray(array $data): CountryBuilderInterface;

    public function build(): Country;

    public function toArray(): array;
}
