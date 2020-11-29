<?php

namespace Tui\Musement\ApiClient\Domain\City\Model;

use Tui\Musement\ApiClient\Domain\Country\Model\Country;
use Tui\Musement\ApiClient\Domain\Shared\Model\AbstractEntity;

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
     * City constructor.
     * @param array<string, string|int|float|Country> $parameters
     */
    public function __construct(array $parameters)
    {
        foreach ($parameters as $name => $value) {
            if (property_exists(self::class, $name)) {
                $this->{$parameter} = $value;
            }
        }
    }

    public function id(): int
    {
        return $this->id;
    }

    public function top(): ?string
    {
        return $this->top;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function content(): ?string
    {
        return $this->content;
    }

    public function metaDescription(): string
    {
        return $this->metaDescription;
    }

    public function metaTitle(): ?string
    {
        return $this->metaTitle;
    }

    /**
     * @return string|null
     */
    public function headline(): ?string
    {
        return $this->headline;
    }

    public function more(): string
    {
        return $this->more;
    }

    public function weight(): int
    {
        return $this->weight;
    }

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
    }

    public function country(): Country
    {
        return $this->country;
    }

    public function coverImageUrl(): string
    {
        return $this->coverImageUrl;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function eventCount(): int
    {
        return $this->eventCount;
    }

    public function timeZone(): string
    {
        return $this->timeZone;
    }

    public function listCount(): int
    {
        return $this->listCount;
    }

    public function venueCount(): int
    {
        return $this->venueCount;
    }

    public function showInPopular(): int
    {
        return $this->showInPopular;
    }
}
