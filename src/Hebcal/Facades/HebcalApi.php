<?php

namespace Ivy47\HebcalApi\Hebcal\Facades;

use Illuminate\Support\Facades\Facade;

class HebcalApi extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Hebcal';
    }

}