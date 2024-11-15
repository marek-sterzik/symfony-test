<?php

namespace App\TempSensor;

use DateTimeImmutable;

class TempData
{
    private ?string $sensorName = null;

    public function __construct(
        private ?float $temp,
        private DateTimeImmutable $timestamp,
        private ?string $errorMessage = null
    ) {

    }

    /* Temp is always in celsius */
    public function getTemp(): ?float
    {
        return $this->temp;
    }

    public function getTimestamp(): DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function hasError(): bool
    {
        return $this->errorMessage !== null;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setSensorName(string $sensorName): self
    {
        $this->sensorName = $sensorName;
        return $this;
    }

    public function getSensorName(): string
    {
        return $this->sensorName;
    }
}