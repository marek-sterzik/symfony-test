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
        if (!preg_match('|^https?://|', $this->url)) {
            return null;
        }
        $result = @file_get_contents($this->url);
        if (is_string($result)) {
            $result = json_decode($result, true);
            if (is_array($result) && isset($result['temp'])) {
                $temp = $result['temp'];
                if (is_numeric($temp)) {
                    return (float)$temp;
                }
            }
        }
        return null;
    }
}
