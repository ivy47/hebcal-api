<?php


namespace Ivy47\HebcalApi\Http\Resources\ZmanimTimes;


use Illuminate\Http\Resources\Json\JsonResource;

class ZmanimTimesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "chatzotNight" => $this->chatzotNight,
            "alotHaShachar" => $this->alotHaShachar,
            "misheyakir" => $this->misheyakir,
            "misheyakirMachmir" => $this->misheyakirMachmir,
            "dawn" => $this->dawn,
            "sunrise" => $this->sunrise,
            "sofZmanShma" => $this->sofZmanShma,
            "sofZmanTfilla" => $this->sofZmanTfilla,
            "chatzot" => $this->chatzot,
            "minchaGedola" => $this->minchaGedola,
            "minchaKetana" => $this->minchaKetana,
            "plagHaMincha" => $this->plagHaMincha,
            "sunset" => $this->sunset,
            "dusk" => $this->dusk,
            "tzeit7083deg" => $this->tzeit7083deg,
            "tzeit85deg" => $this->tzeit85deg,
            "tzeit42min" => $this->tzeit42min,
            "tzeit50min" => $this->tzeit50min,
            "tzeit72min" => $this->tzeit72min,
        ];
    }
}