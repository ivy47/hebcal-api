<?php


namespace Ivy47\HebcalApi\Http\Resources\HebcalItem;


use Illuminate\Http\Resources\Json\ResourceCollection;

class HebcalItemCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            config('hebcal.resource_wrap') => HebcalItemResource::collection($this->collection)
        ];
    }
}