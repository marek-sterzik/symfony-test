<?php

namespace App\TempSensor;

class HttpTempSensor extends AbstractTempSensor
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getTemp(): ?float
    {
        $text = @file_get_contents($this->url);
        if (is_string($text)) {
            $data = json_decode($text, true);
            if (is_array($data) && isset($data["temp"])) {
                if (is_numeric($data['temp'])) {
                    return (float)$data['temp'];
                }
            }
        }
        return null;
    }
}