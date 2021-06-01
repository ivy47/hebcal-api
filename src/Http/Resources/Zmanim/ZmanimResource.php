<?php


namespace Ivy47\HebcalApi\Http\Resources\Zmanim;


use Illuminate\Http\Resources\Json\JsonResource;
use Ivy47\HebcalApi\Http\Resources\HebcalLocation\HebcalLocationResource;
use Ivy47\HebcalApi\Http\Resources\ZmanimTimes\ZmanimTimesResource;

class ZmanimResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'date' => $this->resource->getDate(),
            'location' => new HebcalLocationResource($this->resource->getLocation()),
            'times' => new ZmanimTimesResource($this->resource->getTimes())
        ];
    }
}