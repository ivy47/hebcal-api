<?php


namespace Ivy47\HebcalApi;


use Ivy47\HebcalApi\Http\Resources\HebrewDate\HebrewDateResource;
use Ivy47\HebcalApi\Entities\HebrewDate;

class HebrewDateResponse extends HebcalResponse
{
    /**
     * @var HebrewDate
     */
    private $hebrewDate;

    public function __construct($response)
    {
        parent::__construct($response);

        $this->hebrewDate = new HebrewDate($this->getDecoded());
    }

    /**
     * @return HebrewDateResource
     */
    public function getResource(): HebrewDateResource
    {
        return new HebrewDateResource($this->getHebrewDate());
    }

    /**
     * @return HebrewDate
     */
    public function getHebrewDate(): HebrewDate
    {
        return $this->hebrewDate;
    }

    /**
     * @return mixed
     */
    public function getGy()
    {
        return $this->hebrewDate->gy;
    }

    /**
     * @return mixed
     */
    public function getGm()
    {
        return $this->hebrewDate->gm;
    }

    /**
     * @return mixed
     */
    public function getGd()
    {
        return $this->hebrewDate->gd;
    }

    /**
     * @return mixed
     */
    public function getHy()
    {
        return $this->hebrewDate->hy;
    }

    /**
     * @return mixed
     */
    public function getHm()
    {
        return $this->hebrewDate->hm;
    }

    /**
     * @return mixed
     */
    public function getHd()
    {
        return $this->hebrewDate->hd;
    }

    public function getAfterSunset() {
        return $this->hebrewDate->afterSunset;
    }

    /**
     * @return mixed
     */
    public function getHebrew()
    {
        return $this->hebrewDate->hebrew;
    }

    /**
     * @return mixed
     */
    public function getEvents()
    {
        return $this->hebrewDate->events;
    }
}