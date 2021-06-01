<?php


namespace Ivy47\HebcalApi\Http\Resources\Yahrzeit;


use Illuminate\Http\Resources\Json\JsonResource;
use Ivy47\HebcalApi\Http\Resources\YahrzeitItem\YahrzeitItemResource;

class YahrzeitResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            'title' => $this->resource->getTitle(),
            'date' => $this->resource->getDate(),
            'items' => YahrzeitItemResource::collection($this->resource->getItems()),
        ];

        return $data;
    }
}