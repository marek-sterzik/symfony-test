<?php

namespace App\TempSensor;

abstract class AbstractTempSensor implements TempSensor
{
    private string $name;
    abstract protected function getTemp(): TempData;

    public function getTempData(): TempData
    {
        return $this->getTemp()->setSensorName($this->getName());
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}