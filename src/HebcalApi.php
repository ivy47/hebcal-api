<?php


namespace Ivy47\HebcalApi;


use GuzzleHttp\Client;

class HebcalApi
{
    private $client;
    private $hebcalUri;

    public function __construct($client, $hebcalUri)
    {
        $this->client = $client;
        $this->hebcalUri = $hebcalUri;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }


    /**
     * @param $params https://www.hebcal.com/home/195/jewish-calendar-rest-api
     * @return HebcalCalendar
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHolidays($params): HebcalCalendar
    {
        $response = $this->getClient()->get($this->hebcalUri, [
            'query' => $params
        ]);

        return new HebcalCalendar($response->getBody());
    }
}
