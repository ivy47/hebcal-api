<?php


namespace Ivy47\HebcalApi\Http\Resources\HebcalCalendar;


use Illuminate\Http\Resources\Json\JsonResource;
use Ivy47\HebcalApi\Http\Resources\HebcalItem\HebcalItemResource;
use Ivy47\HebcalApi\Http\Resources\HebcalLocation\HebcalLocationResource;

class HebcalCalendarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->resource->title,
            'date' => $this->resource->date ? $this->resource->date->timestamp : null,
            'location' => new HebcalLocationResource($this->resource->location),
            'items' => HebcalItemResource::collection($this->resource->items)
        ];
    }
}