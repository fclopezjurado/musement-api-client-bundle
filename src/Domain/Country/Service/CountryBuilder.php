<?php

namespace Tui\Musement\ApiClient\Domain\Country\Service;

use Tui\Musement\ApiClient\Domain\Country\Model\Country;

class CountryBuilder implements CountryBuilderInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $isoCode;

    public function fromArray(array $data): CountryBuilderInterface
    {
        foreach ($data as $key => $value) {
            if (property_exists(self::class, $key)) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

    public function build(): Country
    {
        return new Country($this->id, $this->name, $this->isoCode);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
