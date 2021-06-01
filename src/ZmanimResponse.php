<?php


namespace Ivy47\HebcalApi;


use Illuminate\Support\Collection;
use Ivy47\HebcalApi\Http\Resources\Shabbat\ShabbatResource;
use Ivy47\HebcalApi\Http\Resources\Zmanim\ZmanimResource;
use Ivy47\HebcalApi\Models\HebcalItem;
use Ivy47\HebcalApi\Models\HebcalLocation;
use Ivy47\HebcalApi\Models\ZmanimTimes;

class ZmanimResponse extends HebcalResponse
{
    /**
     * @var mixed
     */
    private $date;

    /**
     * @var HebcalLocation
     */
    private $location;

    /**
     * @var ZmanimTimes
     */
    private $times;

    public function __construct($response)
    {
        parent::__construct($response);

        $this->date = $this->getDecoded('date');
        $this->location = new HebcalLocation($this->getDecoded('location'));
        $this->times = new ZmanimTimes($this->getDecoded('times'));
    }

    /**
     * @return ZmanimResource
     */
    public function getResource(): ZmanimResource
    {
        return new ZmanimResource($this);
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return HebcalLocation
     */
    public function getLocation(): HebcalLocation
    {
        return $this->location;
    }

    /**
     * @return ZmanimTimes
     */
    public function getTimes(): ZmanimTimes
    {
        return $this->times;
    }

    /**
     * @return mixed
     */
    public function getChatzotNight()
    {
        return $this->getTimes()->chatzotNight;
    }

    /**
     * @return mixed
     */
    public function getAlotHaShachar()
    {
        return $this->getTimes()->alotHaShachar;
    }

    /**
     * @return mixed
     */
    public function getMisheyakir()
    {
        return $this->getTimes()->misheyakir;
    }

    /**
     * @return mixed
     */
    public function getMisheyakirMachmir()
    {
        return $this->getTimes()->misheyakirMachmir;
    }

    /**
     * @return mixed
     */
    public function getDawn()
    {
        return $this->getTimes()->dawn;
    }

    /**
     * @return mixed
     */
    public function getSunrise()
    {
        return $this->getTimes()->sunrise;
    }

    /**
     * @return mixed
     */
    public function getSofZmanShma()
    {
        return $this->getTimes()->sofZmanShma;
    }

    /**
     * @return mixed
     */
    public function getSofZmanTfilla()
    {
        return $this->getTimes()->sofZmanTfilla;
    }

    /**
     * @return mixed
     */
    public function getChatzot()
    {
        return $this->getTimes()->chatzot;
    }

    /**
     * @return mixed
     */
    public function getMinchaGedola()
    {
        return $this->getTimes()->minchaGedola;
    }

    /**
     * @return mixed
     */
    public function getMinchaKetana()
    {
        return $this->getTimes()->minchaKetana;
    }

    /**
     * @return mixed
     */
    public function getPlagHaMincha()
    {
        return $this->getTimes()->plagHaMincha;
    }

    /**
     * @return mixed
     */
    public function getSunset()
    {
        return $this->getTimes()->sunset;
    }

    /**
     * @return mixed
     */
    public function getDusk()
    {
        return $this->getTimes()->dusk;
    }

    /**
     * @return mixed
     */
    public function getTzeit7083deg()
    {
        return $this->getTimes()->tzeit7083deg;
    }

    /**
     * @return mixed
     */
    public function getTzeit85deg()
    {
        return $this->getTimes()->tzeit85deg;
    }

    /**
     * @return mixed
     */
    public function getTzeit42min()
    {
        return $this->getTimes()->tzeit42min;
    }

    /**
     * @return mixed
     */
    public function getTzeit50min()
    {
        return $this->getTimes()->tzeit50min;
    }

    /**
     * @return mixed
     */
    public function getTzeit72min()
    {
        return $this->getTimes()->tzeit72min;
    }


}