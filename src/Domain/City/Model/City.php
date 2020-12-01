<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Domain\City\Model;

use Tui\Musement\ApiClient\Domain\Country\Model\Country;
use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;

/**
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class City extends AbstractEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $top;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string|null
     */
    protected $content;

    /**
     * @var string
     */
    protected $metaDescription;

    /**
     * @var string|null
     */
    protected $metaTitle;

    /**
     * @var string|null
     */
    protected $headline;

    /**
     * @var string
     */
    protected $more;

    /**
     * @var int
     */
    protected $weight;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var Country
     */
    protected $country;

    /**
     * @var string
     */
    protected $coverImageUrl;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $eventCount;

    /**
     * @var string
     */
    protected $timeZone;

    /**
     * @var int
     */
    protected $listCount;

    /**
     * @var int
     */
    protected $venueCount;

    /**
     * @var int
     */
    protected $showInPopular;

    /**
     * @param array<string, int|string|float|Country|null> $parameters
     */
    public function __construct(array $parameters)
    {
        foreach ($parameters as $name => $value) {
            if (property_exists(self::class, $name)) {
                $this->{$name} = $value;
            }
        }
    }

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
    }

    public function name(): string
    {
        return $this->name;
    }
}
