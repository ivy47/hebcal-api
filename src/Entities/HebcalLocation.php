<?php

namespace Ivy47\HebcalApi\Entities;


class HebcalLocation extends HebcalEntity
{
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
