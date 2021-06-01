<?php


namespace Ivy47\HebcalApi\Http\Resources\Zmanim;


use Illuminate\Http\Resources\Json\JsonResource;
use Ivy47\HebcalApi\Http\Resources\ZmanimLocation\ZmanimlLocationResource;
use Ivy47\HebcalApi\Http\Resources\ZmanimTimes\ZmanimTimesResource;

class ZmanimResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'date' => $this->resource->getDate(),
            'location' => new ZmanimlLocationResource($this->resource->getLocation()),
            'times' => new ZmanimTimesResource($this->resource->getTimes())
        ];
    }
}