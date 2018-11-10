<?php

namespace Weather\Api;

use Weather\Model\NullWeather;
use Weather\Model\Weather;

class DbRepository implements DataProvider
{

    private $dbName;

    function __construct($dbName)
    {
        $this->dbName = $dbName;
    }

    /**
     * @param \DateTime $date
     * @return Weather
     */
    public function selectByDate(\DateTime $date): Weather
    {
        $items = $this->selectAll();
        $result = new NullWeather();

        foreach ($items as $item) {
            if ($item->getDate()->format('Y-m-d') === $date->format('Y-m-d')) {
                $result = $item;
            }
        }

        return $result;
    }

    public function selectByRange(\DateTime $from, \DateTime $to): array
    {
        $items = $this->selectAll();
        $result = [];

        foreach ($items as $item) {
            if ($item->getDate() >= $from && $item->getDate() <= $to) {
                $result[] = $item;
            }
        }

        return $result;
    }

    /**
     * @return Weather[]
     */
    private function selectAll(): array
    {
        $result = [];
        $data = json_decode(
            file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'Db' . DIRECTORY_SEPARATOR . $this->dbName.'.json'),
            true
        );
        foreach ($data as $item) {
            $record = new Weather();
            $record->setDate(new \DateTime($item['date']));
            $record->setDayTemp((empty($item['dayTemp'])) ? null : $item['dayTemp']);
            $record->setNightTemp((empty($item['nightTemp'])) ? null : $item['nightTemp']);
            $record->setSky((empty($item['sky'])) ? 000 : $item['sky']);

            $record->setDay((empty($item['day'])) ? '' : $item['day']);
            $record->setDayLow((empty($item['low'])) ? null : $item['low']);
            $record->setDayHigh((empty($item['high'])) ? null : $item['high']);
            $record->setSkyText((empty($item['text'])) ? '' : $item['text']);

            $result[] = $record;
        }

        return $result;
    }
}
