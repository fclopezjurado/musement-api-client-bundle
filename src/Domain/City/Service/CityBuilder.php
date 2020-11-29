<?php

namespace Tui\Musement\ApiClient\Domain\City\Service;

use Tui\Musement\ApiClient\Domain\City\Model\City;
use Tui\Musement\ApiClient\Domain\Country\Model\Country;

class CityBuilder implements CityBuilderInterface
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

    public function fromArray(array $data): CityBuilderInterface
    {
        foreach ($data as $key => $value) {
            if (property_exists(self::class, $key)) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

    public function build(): City
    {
        return new City(get_object_vars($this));
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
