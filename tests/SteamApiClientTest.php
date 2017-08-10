<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use CsgoApi\SteamApiClient;

/**
 * Class SteamApiClientTest
 * @covers SteamApiClient
 */
class SteamApiClientTest extends TestCase
{

    public function testInstanceCanBeCreated(): void
    {
        $this->assertInstanceOf(SteamApiClient::class, new SteamApiClient("940321425"));
    }

    public function testFetchData(): void
    {
        $apiclient = new SteamApiClient("940321425");
        $this->assertInstanceOf(GuzzleHttp\Psr7\Response::class, $apiclient->fetchData());
    }

    public function testForSteamServerResponse(): void
    {
        $apiclient = new SteamApiClient("940321425");
        $this->assertEquals($apiclient->fetchData()->getStatusCode(), 200);
    }

    public function testMapInformationIsArray(): void
    {
        $apiclient = new SteamApiClient("940321425");
        $this->assertTrue(is_array($apiclient->getMapInfo($apiclient->fetchData())));
    }
}
