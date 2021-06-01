<?php

namespace Ivy47\HebcalApi\Models;

use Illuminate\Database\Eloquent\Model;

class HebrewDate extends Model
{
    protected $table = null;

    protected $casts = [
        'events' => 'array'
    ];

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
