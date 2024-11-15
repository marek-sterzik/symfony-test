<?php

namespace App\TempSensor;

interface TempSensor
{
    public function getTempData(): TempData;
}