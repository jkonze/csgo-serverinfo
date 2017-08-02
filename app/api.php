<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use CsgoApi\ServerData;
use xPaw\SourceQuery\SourceQuery;
use CsgoApi\SteamApiClient;

require '../vendor/autoload.php';


$app = new \Slim\App;

$app->post('/csgo', function (Request $request, Response $response) {
    $parameters = json_encode($request->getParsedBody());
    $res = [];
    $server = new ServerData($parameters);

    $sourceQuery = new SourceQuery();
    try {
        $sourceQuery->Connect($server->getServerip(), $server->getServerport(), 1, SourceQuery::SOURCE);
        $rawInfo = (object)$sourceQuery->getInfo();
        $res['server_title'] = $rawInfo->HostName;
        $res['players'] = $rawInfo->Players;
        $res['max_players'] = $rawInfo->MaxPlayers;
        $res['uses_password'] = $rawInfo->Password;
        $res['tags'] = explode(',', $rawInfo->GameTags);

        $steamApi = new SteamApiClient($rawInfo->Map);

        if (null !== $steamApi->getGuzzleClient()) {
            $fetched = $steamApi->fetchData();
            $steamResponse = $steamApi->getMapInfo($fetched);
            $res['map_title'] = $steamResponse['maptitle'];
            $res['image_url'] = $steamResponse['url'];
        } else {
            $res['map_title'] = $rawInfo->Map;
            $res['image_url'] = $_SERVER['SERVER_NAME'] . '/Resources/default.jpg';
        }

    } catch (Exception $exception) {
        $error = array('error_message' => 'There seems to be no server running on this host');
        return $response->withJson($error, 418);
    } finally {
        $sourceQuery->Disconnect();
    }
    return $response->withJson($res, 200);
});
$app->run();