<?php

namespace App\TempSensor;

use DateTimeImmutable;

class HttpTempSensor extends AbstractTempSensor
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    protected function getTemp(): TempData
    {
        if (!preg_match('|^https?://|', $this->url)) {
            return new TempData(null, new DateTimeImmutable(), "invalid url");
        }
        $result = @file_get_contents($this->url);
        if (is_string($result)) {
            $result = json_decode($result, true);
            if (is_array($result) && isset($result['temp'])) {
                $temp = $result['temp'];
                if (is_numeric($temp)) {
                    return new TempData((float)$temp, new DateTimeImmutable());
                }
            }
        }
        return new TempData(null, new DateTimeImmutable(), "invalid response");
    }
}
