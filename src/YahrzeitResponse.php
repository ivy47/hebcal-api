<?php


namespace Ivy47\HebcalApi;


use Illuminate\Support\Collection;
use Ivy47\HebcalApi\Entities\YahrzeitItem;
use Ivy47\HebcalApi\Http\Resources\Yahrzeit\YahrzeitResource;

class YahrzeitResponse extends HebcalResponse
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
     * @var Collection
     */
    private $items;

    public function __construct($response)
    {
        parent::__construct($response);

        $this->title = $this->getDecoded('title');
        $this->date = $this->getDecoded('date');

        $this->items = collect();
        if (!empty($items = $this->getDecoded('items'))) {
            foreach ($items as $item) {
                $this->items->add(new YahrzeitItem($item));
            }
        }
    }


    public function getResource()
    {
        return new YahrzeitResource($this);
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
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }
}