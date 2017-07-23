<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class ServerDataTest extends TestCase
{

    public $testJson;

    public function testInstanceCanBeCreated(): void
    {
        $this->testJson = json_encode(array('server_ip' => "127.0.0.1", 'server_port' => "26015"));
        $this->assertInstanceOf(ServerData::class, new ServerData($this->testJson));
    }

    public function testExpectsServerIp(): void
    {
        $this->testJson = json_encode(array('server_port' => "26015"));
        $this->expectException(InvalidArgumentException::class);
        new ServerData($this->testJson);
    }

    public function testFallbackToDefaultPort(): void
    {
        $this->testJson = json_encode(array('server_ip' => "127.0.0.1"));
        $serverdataObj = new ServerData($this->testJson);
        $this->assertEquals($serverdataObj->getServerport(), "27015");
    }
}