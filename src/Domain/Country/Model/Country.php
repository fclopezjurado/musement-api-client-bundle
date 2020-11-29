<?php

namespace Tui\Musement\ApiClient\Domain\Country\Model;

use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;

class Country extends AbstractEntity
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

    /**
     * Country constructor.
     * @param int $id
     * @param string $name
     * @param string $isoCode
     */
    public function __construct(int $id, string $name, string $isoCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isoCode = $isoCode;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function isoCode(): string
    {
        return $this->isoCode;
    }
}
