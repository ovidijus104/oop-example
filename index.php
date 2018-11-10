<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$loader = new Twig_Loader_Filesystem('View', __DIR__ . '/src/Weather');
$twig = new Twig_Environment($loader, ['cache' => __DIR__ . '/cache', 'debug' => true]);


$controller = new \Weather\Controller\StartPage();
switch ($request->getRequestUri()) {
    case '/week':
        $dbRecource = 'standart-db';
        $renderInfo = $controller->getWeekWeather($dbRecource);
        break;
    case '/week-google-api':
        $dbRecource = 'google-api';
        $renderInfo = $controller->getWeekWeather($dbRecource);
        break;
    case '/today-google-api':
        $dbRecource = 'google-api';
        $renderInfo = $controller->getTodayWeather($dbRecource);
        break;
    case '/week-weather-json':
        $dbRecource = 'weather-db';
        $renderInfo = $controller->getWeekWeather($dbRecource);
        break;
    case '/today-weather-json':
        $dbRecource = 'weather-db';
        $renderInfo = $controller->getTodayWeather($dbRecource);
        break;

    case '/':
    default:
        $dbRecource = 'standart-db';
        $renderInfo = $controller->getTodayWeather($dbRecource);
    break;
}
$renderInfo['context']['resources_dir'] = 'src/Weather/Resources';

$content = $twig->render($renderInfo['template'], $renderInfo['context']);

$response = new Response(
    $content,
    Response::HTTP_OK,
    array('content-type' => 'text/html')
);
$response->prepare($request);
$response->send();
