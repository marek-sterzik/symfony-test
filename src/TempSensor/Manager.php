<?php

namespace App\TempSensor;

use Exception;

class Manager
{
    private ?array $sensors = null;
    private string $dbFile;

    public function __construct()
    {
        $this->dbFile = dirname(__DIR__, 2) . "/var/sensors.json";
    }

    const TYPES = [
        "http" => HttpTempSensor::class,
        "test" => TestTempSensor::class,
    ];

    private function getSensorsConfig(): array
    {
        $content = @file_get_contents($this->dbFile);
        if (!is_string($content)) {
            return [];
        }
        $content = @json_decode($content, true);
        if (!is_array($content)) {
            return [];
        }
        return $content;
    }

    private function instantiateSensor(array $config): TempSensor
    {
        $type = $config['type'];
        $name = $config['name'];
        if (!isset(self::TYPES[$type])) {
            throw new Exception("Unknown sensor type: $type");
        }
        $class = self::TYPES[$type];
        unset($config['type']);
        unset($config['name']);
        $instance = new $class(...$config);
        $instance->setName($name);
        return $instance;
    }

    private function createSensors(): array
    {
        $sensors = [];
        foreach ($this->getSensorsConfig() as $config) {
            $sensors[] = $this->instantiateSensor($config);
        }
        return $sensors; 
    }

    public function getSensors(): array
    {
        if ($this->sensors === null) {
            $this->sensors = $this->createSensors();
        }
        return $this->sensors;
    }

}