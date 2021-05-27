<?php

namespace Ivy47\Hebcal\Models;

use Illuminate\Database\Eloquent\Model;

class Hebcal extends Model
{
    protected $table = null;

    protected $casts = [
        'date' => 'datetime',
        'leyning' => 'array'
    ];

    protected $fillable = [
        'title',
        'date',
        'category',
        'title_orig',
        'hebrew',
        'leyning',
        'memo',
        'link'
    ];

}
