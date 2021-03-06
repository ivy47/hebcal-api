<?php


namespace Ivy47\HebcalApi;


use Illuminate\Support\Collection;
use Ivy47\HebcalApi\Http\Resources\HebcalCalendar\HebcalCalendarResource;
use Ivy47\HebcalApi\Entities\HebcalItem;
use Ivy47\HebcalApi\Entities\HebcalLocation;

class HebcalCalendarResponse extends HebcalResponse
{
    /**
     * @var mixed
     */
    private $title;


    /**
     * @var mixed
     */
    private $date;

    /**
     * @var HebcalLocation
     */
    private $location;

    /**
     * @var Collection
     */
    private $items;


    public function __construct($response) {
        parent::__construct($response);

        $this->title = $this->getDecoded('title');
        $this->date = $this->getDecoded('date');
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
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDate()
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
     * @return Collection
     */
    public function getItems(array $categories = []): Collection
    {
        if (empty($categories)) {
            return $this->items;
        }

        return $this->items->whereIn('category', $categories);
    }
}