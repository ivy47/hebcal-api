<?php


namespace Ivy47\HebcalApi\Http\Resources\HebcalLocation;


use Illuminate\Http\Resources\Json\JsonResource;

class HebcalLocationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "title" => $this->title,
            "city" => $this->city,
            "tzid" => $this->tzid,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "cc" => $this->cc,
            "country" => $this->country,
            "admin1" => $this->admin1,
            "geo" => $this->geo,
            "geonameid = $this->geonameid"
        ];
    }
}