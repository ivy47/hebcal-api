<?php


namespace Ivy47\HebcalApi;


use Illuminate\Support\Collection;
use Ivy47\HebcalApi\Http\Resources\Shabbat\ShabbatResource;
use Ivy47\HebcalApi\Entities\HebcalItem;
use Ivy47\HebcalApi\Entities\HebcalLocation;

class ShabbatResponse extends HebcalResponse
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

    public function __construct($response)
    {
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
     * @return ShabbatResource
     */
    public function getResource(): ShabbatResource
    {
        return new ShabbatResource($this);
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
    public function getItems(): Collection
    {
        return $this->items;
    }
}