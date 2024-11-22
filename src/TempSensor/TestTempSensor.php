<?php

namespace App\TempSensor;

class TestTempSensor extends AbstractTempSensor
{
    private bool $toggleBit = false;

    public function getTemp(): ?float
    {
        $ret = $this->toggleBit ? null : 22.5;
        $this->toggleBit = !$this->toggleBit;
        return $ret;
    }
}