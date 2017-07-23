<?php

use GuzzleHttp\Client;

class SteamApiClient
{
    protected $steamServer = 'https://api.steampowered.com/';
    protected $requestMethod = 'POST';
    private $map;
    private $guzzleClient;

    /**
     * @return mixed
     */
    public function getGuzzleClient()
    {
        return $this->guzzleClient;
    }


    public function createGuzzleClient()
    {
        $this->guzzleClient = new Client([
            'base_uri' => $this->steamServer,
            'timeout' => 2.0,
        ]);
    }

    /**
     * @return mixed
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param mixed $map
     */
    public function setMap($map)
    {
        $this->map = $this->sanitizeMap($map);
    }

    private function sanitizeMap($unfilteredMap)
    {
        if (preg_match('/([a-zA-Z]*\/{1,})(?<workshopid>\d+)/', $unfilteredMap, $matches) && $this->isInteger($matches['workshopid'])) {
            return $matches['workshopid'];
        } else {
            return $unfilteredMap;
        }
    }

    private function isInteger($possibleInt)
    {
        if (filter_var($possibleInt, FILTER_VALIDATE_INT)) {
            return true;
        } else {
            return false;
        }
    }

    public function __construct(string $map)
    {
        $this->setMap($map);
        if ($this->isInteger($map)) {
            $this->createGuzzleClient();

        }
    }

    public function fetchData()
    {
        return $guzzleRequest = $this->getGuzzleClient()->request($this->requestMethod, 'ISteamRemoteStorage/GetPublishedFileDetails/v1/', [
            'form_params' => [
                'itemcount' => '1',
                'publishedfileids[0]' => $this->getMap()
            ]
        ]);
    }

    public function getMapInfo($request)
    {
        $responseBody = json_decode($request->getBody(), true);
        $mapInfo['url'] = $responseBody['response']['publishedfiledetails'][0]['preview_url'];
        $mapInfo['maptitle'] = $responseBody['response']['publishedfiledetails'][0]['title'];
        return $mapInfo;
    }


}