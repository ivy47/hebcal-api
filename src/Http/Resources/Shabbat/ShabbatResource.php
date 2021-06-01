<?php


namespace Ivy47\HebcalApi\Http\Resources\Shabbat;


use Illuminate\Http\Resources\Json\JsonResource;
use Ivy47\HebcalApi\Http\Resources\HebcalItem\HebcalItemResource;
use Ivy47\HebcalApi\Http\Resources\HebcalLocation\HebcalLocationResource;

class ShabbatResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->resource->getTitle(),
            'date' => $this->resource->getDate(),
            'location' => new HebcalLocationResource($this->resource->getLocation()),
            'items' => HebcalItemResource::collection($this->resource->getItems())
        ];
    }
}