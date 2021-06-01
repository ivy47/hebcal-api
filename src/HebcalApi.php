<?php


namespace Ivy47\HebcalApi;


use GuzzleHttp\Client;

class HebcalApi
{
    private $client;
    private $hebcalUri;
    private $converterUri;

    public function __construct(
        $client,
        $config
    )
    {
        $this->client = $client;
        if (isset($config['hebcal_uri'])) {
            $this->hebcalUri = $config['hebcal_uri'];
        }
        if (isset($config['converter_uri'])) {
            $this->converterUri = $config['converter_uri'];
        }
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    private function prepareParams($params) {
        $params['json'] = 'json';
        return $params;
    }


    /**
     * @param $params https://www.hebcal.com/home/195/jewish-calendar-rest-api
     * @return HebcalCalendarResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHolidays($params): HebcalCalendarResponse
    {
        $params = $this->prepareParams($params);

        $response = $this->getClient()->get($this->hebcalUri, [
            'query' => $params
        ]);

        return new HebcalCalendarResponse($response);
    }

    /**
     * @param $params https://www.hebcal.com/home/219/hebrew-date-converter-rest-api
     * @return HebrewDateResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function convertDate($params): HebrewDateResponse
    {
        $params = $this->prepareParams($params);

        $response = $this->getClient()->get($this->converterUri, [
            'query' => $params
        ]);

        return new HebrewDateResponse($response);
    }
}
