<?php

namespace Ivy47\HebcalApi\Models;

use Illuminate\Database\Eloquent\Model;

class ZmanimTimes extends Model
{
    protected $table = null;

    protected $fillable = [
        "chatzotNight",
        "alotHaShachar",
        "misheyakir",
        "misheyakirMachmir",
        "dawn",
        "sunrise",
        "sofZmanShma",
        "sofZmanTfilla",
        "chatzot",
        "minchaGedola",
        "minchaKetana",
        "plagHaMincha",
        "sunset",
        "dusk",
        "tzeit7083deg",
        "tzeit85deg",
        "tzeit42min",
        "tzeit50min",
        "tzeit72min",
    ];

}
