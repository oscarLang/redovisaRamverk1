<?php

namespace Osln\Geo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class IpstackModule implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function __construct()
    {
        $this->key = require(ANAX_INSTALL_PATH . "/config/ipstack.php");
    }
    public function test()
    {
        var_dump($this->key["key"]);
    }
    public function fetchFromIp($ip)
    {
        $url = "http://api.ipstack.com/" . $ip . "?access_key=" . $this->key["key"];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);
        $decoded = json_decode($json, true);

        var_dump($json);
        return $decoded;
    }
}
