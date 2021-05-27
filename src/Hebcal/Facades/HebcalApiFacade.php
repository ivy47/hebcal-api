<?php

namespace Ivy47\HebcalApi\Hebcal\Facades;

use Illuminate\Support\Facades\Facade;

class HebcalApiFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'HebcalApi';
    }

}