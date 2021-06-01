<?php


namespace Ivy47\HebcalApi;


use Carbon\Carbon;
use Ivy47\HebcalApi\Http\Resources\HebcalCalendar\HebcalCalendarResource;
use Ivy47\HebcalApi\Models\HebcalItem;
use Ivy47\HebcalApi\Models\HebcalLocation;

class HebcalCalendarResponse extends HebcalResponse
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var Carbon
     */
    private $date;

    /**
     * @var HebcalLocation
     */
    private $location;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $items;


    public function __construct($response) {
        parent::__construct($response);

        $this->title = $this->getDecoded('title');
        $this->date = new Carbon($this->getDecoded('date'));
        $this->location = new HebcalLocation($this->getDecoded('location'));

        $this->items = collect();
        if (!empty($items = $this->getDecoded('items'))) {
            foreach ($items as $item) {
                $this->items->add(new HebcalItem($item));
            }
        }

    }

    /**
     * @return HebcalCalendarResource
     */
    public function getResource(): HebcalCalendarResource
    {
        return new HebcalCalendarResource($this);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
    }

    /**
     * @return HebcalLocation
     */
    public function getLocation(): HebcalLocation
    {
        return $this->location;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getItems(): \Illuminate\Support\Collection
    {
        return $this->items;
    }
}