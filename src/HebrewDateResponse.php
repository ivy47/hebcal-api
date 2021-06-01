<?php


namespace Ivy47\HebcalApi;


use Carbon\Carbon;
use Ivy47\HebcalApi\Http\Resources\HebcalCalendar\HebcalCalendarResource;
use Ivy47\HebcalApi\Http\Resources\HebrewDate\HebrewDateResource;
use Ivy47\HebcalApi\Models\HebcalItem;
use Ivy47\HebcalApi\Models\HebcalLocation;
use Ivy47\HebcalApi\Models\HebrewDate;

class HebrewDateResponse extends HebcalResponse
{
    private $hebrewDate;

    public function __construct($response) {
        parent::__construct($response);

        $this->hebrewDate = new HebrewDate($this->getDecoded());
    }

    /**
     * @return HebrewDateResource
     */
    public function getResource(): HebrewDateResource
    {
        return new HebrewDateResource($this);
    }
}