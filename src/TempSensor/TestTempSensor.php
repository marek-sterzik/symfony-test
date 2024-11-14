<?php

namespace App\TempSensor;

class TestTempSensor extends AbstractTempSensor
{
    public function getTemp(): ?float
    {
        return 22.5;
    }
}