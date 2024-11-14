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

    public function printTemp(): void
    {
        $temp = $this->getTemp();
        $name = $this->getName();
        if ($temp !== null) {
            echo "Teplota na senzoru '$name' je: ${temp}°C\n";
        } else {
            echo "Teplota na senzoru '$name' není k dispozici\n";
        }
    }
}