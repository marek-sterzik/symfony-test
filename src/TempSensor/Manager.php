<?php

namespace App\TempSensor;

class Manager
{
    public function getSensors(): array
    {
        $sensors = [];
        $sensors[] = (new TestTempSensor())->setName("s1");
        $sensors[] = (new HttpTempSensor(
            "https://home.spsostrov.cz/~sterzik/temp.php"
        ))->setName("s3");
        return $sensors; 
    }
}