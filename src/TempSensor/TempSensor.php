<?php

namespace App\TempSensor;

interface TempSensor
{
    public function getTemp(): ?float;
    public function getName(): string;
}