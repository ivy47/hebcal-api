<?php


namespace Ivy47\HebcalApi;


use Carbon\Carbon;
use Ivy47\HebcalApi\Http\Resources\Shabbat\ShabbatResource;
use Ivy47\HebcalApi\Models\HebcalItem;
use Ivy47\HebcalApi\Models\HebcalLocation;

class ShabbatResponse extends HebcalResponse
{
    /**
     * @var array|mixed
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

    public function __construct($response)
    {
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
     * @return ShabbatResource
     */
    public function getResource(): ShabbatResource
    {
        return new ShabbatResource($this);
    }
}