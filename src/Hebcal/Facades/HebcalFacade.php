<?php

namespace Ivy47\HebcalApi\Hebcal\Facades;

use Illuminate\Support\Facades\Facade;

class HebcalFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return \Ivy47\HebcalApi\Hebcal\Hebcal::class;
    }

}