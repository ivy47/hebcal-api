<?php

namespace Ivy47\HebcalApi\Models;

use Illuminate\Database\Eloquent\Model;

class HebcalItem extends Model
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
