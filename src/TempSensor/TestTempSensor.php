<?php

namespace App\TempSensor;

use DateTimeImmutable;

class TestTempSensor extends AbstractTempSensor
{
    protected function getTemp(): TempData
    {
        return new TempData(22.5, new DateTimeImmutable());
    }
}