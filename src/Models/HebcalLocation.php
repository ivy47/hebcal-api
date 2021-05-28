<?php

namespace Ivy47\HebcalApi\Models;

use Illuminate\Database\Eloquent\Model;

class HebcalLocation extends Model
{
    protected $table = null;

    protected $fillable = [
        "title",
        "city",
        "tzid",
        "latitude",
        "longitude",
        "cc",
        "country",
        "admin1",
        "geo",
        "geonameid"
    ];

}
