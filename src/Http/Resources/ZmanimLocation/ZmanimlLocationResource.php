<?php


namespace Ivy47\HebcalApi\Http\Resources\ZmanimLocation;


use Illuminate\Http\Resources\Json\JsonResource;

class ZmanimlLocationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "il" => $this->il,
            "tzid" => $this->tzid,
            "name" => $this->name,
            "cc" => $this->cc,
            "geoid" => $this->geoid,
            "asciiname" => $this->asciiname,
            "geo" => $this->geo,
            "geonameid" => $this->geonameid,
            "admin1" => $this->admin1
        ];
    }
}