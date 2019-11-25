<?php

namespace Osln\Geo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class Weather
{
    public function initialize() : void
    {
        $this->curl = new CurlRequest();
        $this->config = new LoadConfig();
    }
    public function forecast($lat, $lon) : array
    {
        $url = "https://api.darksky.net/forecast/%1\$s/%2\$s,%3\$s"
        $key = $this->config->getKey("darksky");
        $urlFinal = sprintf($url, $key, $lat, $lon);
        $data = $this->curl->fetch($urlFinal);
        return [$data];
    }
}
