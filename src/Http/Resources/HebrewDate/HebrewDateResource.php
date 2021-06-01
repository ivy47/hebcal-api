<?php


namespace Ivy47\HebcalApi\Http\Resources\HebrewDate;


use Illuminate\Http\Resources\Json\JsonResource;

class HebrewDateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "gy" => $this->gy,
            "gm" => $this->gm,
            "gd" => $this->gd,
            "hy" => $this->hy,
            "hm" => $this->hm,
            "hd" => $this->hd,
            "hebrew" => $this->hebrew,
            "events" => $this->events,
        ];
    }
}