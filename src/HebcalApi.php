<?php


namespace Ivy47\HebcalApi;


use GuzzleHttp\Client;

class HebcalApi
{
    private $client;
    private $hebcalUri;
    private $converterUri;
    private $shabbatUri;
    private $zmanimUri;
    private $yahrzeitUri;

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

        if (isset($config['shabbat_uri'])) {
            $this->shabbatUri = $config['shabbat_uri'];
        }

        if (isset($config['zmanim_uri'])) {
            $this->zmanimUri = $config['zmanim_uri'];
        }

        if (isset($config['yahrzeit_uri'])) {
            $this->yahrzeitUri = $config['yahrzeit_uri'];
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
        $params['cfg'] = 'json';
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

    /**
     * @param $params https://www.hebcal.com/home/197/shabbat-times-rest-api
     * @return ShabbatResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getShabbatTimes($params): ShabbatResponse
    {
        $params = $this->prepareParams($params);

        $response = $this->getClient()->get($this->shabbatUri, [
            'query' => $params
        ]);

        return new ShabbatResponse($response);
    }

    /**
     * @param $params https://www.hebcal.com/home/1663/zmanim-halachic-times-api
     * @return ZmanimResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getZmanim($params): ZmanimResponse
    {
        $params = $this->prepareParams($params);

        $response = $this->getClient()->get($this->zmanimUri, [
            'query' => $params
        ]);

        return new ZmanimResponse($response);
    }

    /**
     * @param $params https://www.hebcal.com/home/1705/yahrzeit-anniversary-api
     * @return YahrzeitResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generateYahrzeit($params)
    {
        $params = $this->prepareParams($params);

        $response = $this->getClient()->post($this->yahrzeitUri, [
            'form_params' => $params
        ]);

        return new YahrzeitResponse($response);
    }
}
