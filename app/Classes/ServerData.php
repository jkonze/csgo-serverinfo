<?php

class ServerData
{
    private $serverinfo;
    private $serverip;
    private $serverport;

    /**
     * @return mixed
     */
    public function getServerinfo()
    {
        return $this->serverinfo;
    }

    /**
     * @param mixed $jsonServerInfo
     */
    public function setServerinfo($jsonServerInfo)
    {
        if ($this->isJson($jsonServerInfo)) {
            $this->serverinfo = json_decode($jsonServerInfo, true);
        }
    }

    /**
     * @return mixed
     */
    public function getServerip()
    {
        return $this->serverip;
    }


    public function setServerip()
    {
        if (isset($this->serverinfo['server_ip'])) {
            $this->serverip = $this->serverinfo['server_ip'];
        } else {
            throw new InvalidArgumentException('Server IP / hostname must be set');
        }
    }

    /**
     * @return string
     */
    public function getServerport(): string
    {

        return $this->serverport;
    }

    /**
     * @param string $serverport
     */
    public function setServerport()
    {
        if (isset($this->serverinfo['server_port']) && preg_match('/^(?:\d{2,5})+$/', $this->serverinfo['server_port'])) {
            $this->serverport = $this->serverinfo['server_port'];
        } else {
            // Falling back to default port.
            $this->serverport = '27015';
        }
    }


    /**
     * @param string $json
     * @throws Exception if no valid json is provided
     * @return boolean
     */
    private function isJson(string $json)
    {
        json_decode($json);
        if (json_last_error() != JSON_ERROR_NONE) {
            throw new Exception('Not a valid json');
        } else {
            return true;
        }
    }

    public function __construct(string $requestJson)
    {
        $this->setServerinfo($requestJson);
        $this->setServerip();
        $this->setServerport();
    }
}