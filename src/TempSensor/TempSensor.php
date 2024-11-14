<?php

namespace App\TempSensor;

interface TempSensor
{

    /* Temp is always in celsius */
    public function getTemp(): ?float;
    public function getName(): string;
}