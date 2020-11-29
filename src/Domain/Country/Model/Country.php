<?php

declare(strict_types=1);

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

    public function __construct(int $id, string $name, string $isoCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isoCode = $isoCode;
    }

    public function __get(string $name): mixed
    {
        return $this->{$name};
    }
}
