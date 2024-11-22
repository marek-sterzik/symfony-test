<?php

namespace App\TempSensor;

abstract class AbstractTempSensor implements TempSensor
{
    private string $name;

    abstract public function getTemp(): ?float;

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