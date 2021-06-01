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
}