<?php


namespace Ivy47\HebcalApi\Hebcal;


use GuzzleHttp\Client;
use Illuminate\Http\Client\Response;

class Hebcal
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
     * @param $params // https://www.hebcal.com/home/195/jewish-calendar-rest-api
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHolidays($params) {
        return new Response($this->getClient()->get($this->hebcalUri, [
            'query' => $params
        ]));
    }
}
