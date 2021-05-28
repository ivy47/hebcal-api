<?php

namespace Ivy47\HebcalApi\Facades;

use Illuminate\Support\Facades\Facade;
use Ivy47\HebcalApi\HebcalApi;

class HebcalApiFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return HebcalApi::class;
    }

}