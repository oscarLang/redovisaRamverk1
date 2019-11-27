<?php

namespace Osln\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class Weather
{
    function __construct()
    {
        $this->curl = new CurlRequest();
        $this->config = new LoadConfig();
    }
    public function forecast($lat, $lon) : array
    {
        $url = "https://api.darksky.net/forecast/%1\$s/%2\$s,%3\$s?exclude=currently,flags,hourly,minutely&units=si";
        $key = $this->config->getKey("darksky");
        $urlFinal = sprintf($url, $key, $lat, $lon);
        $data = $this->curl->fetch($urlFinal);
        return [$data];
    }

    public function getLastMonth($lat, $lon) : array
    {
        $currentTimes = $this->getArrayOfDays();
        $urls = [];
        foreach ($currentTimes as $time) {
            $key = $this->config->getKey("darksky");
            $url = "https://api.darksky.net/forecast/%1\$s/%2\$s,%3\$s,%4\$s?exclude=currently,flags,hourly,minutely&units=si";
            $urlFinal = sprintf($url, $key, $lat, $lon, $time);
            $urls[] = $urlFinal;
        }
        // var_dump($urls);
        $data = $this->curl->fetchMultiple($urls);
        return [$data];
    }

    private function getArrayOfDays() : array
    {
        $times = [];
        $now = time();
        for ($i=0; $i < 30; $i++) {
            $now -= (24 * 60 * 60);
            $times[] = $now;
        }
        return $times;
    }
}
