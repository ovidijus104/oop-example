<?php

namespace Weather\Controller;

use Weather\Manager;
use Weather\Model\NullWeather;

class StartPage
{

    public function getTodayWeather($dbResource): array
    {
        try {
            $service = new Manager($dbResource);
            $weather = $service->getTodayInfo();
        } catch (\Exception $exp) {
            $weather = new NullWeather();
        }

        return ['template' => 'today-weather.twig', 'context' => ['weather' => $weather]];


    }

    public function getWeekWeather($dbResource): array
    {
        echo $dbResource;
        try {
            $service = new Manager($dbResource);
            $weathers = $service->getWeekInfo();
        } catch (\Exception $exp) {
            $weathers = [];
        }

        return ['template' => 'range-weather.twig', 'context' => ['weathers' => $weathers]];


    }
}
