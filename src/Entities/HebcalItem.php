<?php

namespace Ivy47\HebcalApi\Entities;


class HebcalItem extends HebcalEntity
{
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
