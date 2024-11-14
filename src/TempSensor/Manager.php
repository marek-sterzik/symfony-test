<?php

namespace App\TempSensor;

class Manager
{
    public function getSensors(): array
    {
        $sensors = [];
        $sensors[] = (new TestTempSensor())->setName("test");
        $sensors[] = (new HttpTempSensor(
            "https://home.spsostrov.cz/~sterzik/temp.php"
        ))->setName("trida");
        $sensors[] = (new HttpTempSensor(
            "https://home.spsostrov.cz/~sterzik/temp.php?sensor=2"
        ))->setName("venku");

        return $sensors;
    }
}