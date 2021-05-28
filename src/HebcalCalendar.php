<?php


namespace Ivy47\HebcalApi;


use Carbon\Carbon;
use Ivy47\HebcalApi\Http\Resources\HebcalCalendar\HebcalCalendarResource;
use Ivy47\HebcalApi\Models\HebcalItem;
use Ivy47\HebcalApi\Models\HebcalLocation;

class HebcalCalendar
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var Carbon
     */
    public $date;

    /**
     * @var HebcalLocation
     */
    public $location;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $items;

    /**
     * @var string
     */
    private $json;

    /**
     * @var mixed|array
     */
    private $decoded;

    /**
     * @var HebcalCalendarResource
     */
    private $resource;


    public function __construct($json) {
        $this->json = $json;
        $this->decoded = json_decode($json, true);

        if (isset($this->decoded['title'])) {
            $this->title = $this->decoded['title'];
        }

        if (isset($this->decoded['date'])) {
            $this->date = new Carbon($this->decoded['date']);
        }

        if (isset($this->decoded['location'])) {
            $this->location = new HebcalLocation($this->decoded['location']);
        }

        $this->items = collect();
        if (isset($this->decoded['items'])) {
            foreach ($this->decoded['items'] as $item) {
                $this->items->add(new HebcalItem($item));
            }
        }

        $this->resource = new HebcalCalendarResource($this);
    }

    /**
     * @return string
     */
    public function getJson(): string
    {
        return $this->json;
    }

    /**
     * @return HebcalCalendarResource
     */
    public function getResource(): HebcalCalendarResource
    {
        return $this->resource;
    }

    /**
     * @return array|mixed
     */
    public function getDecoded(): array
    {
        return $this->decoded;
    }
}