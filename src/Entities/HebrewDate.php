<?php

namespace Ivy47\HebcalApi\Entities;


class HebrewDate extends HebcalEntity
{
    protected $fillable = [
        'gy',
        'gm',
        'gd',
        'hy',
        'hm',
        'hd',
        'afterSunset',
        'hebrew',
        'events',
    ];

}
