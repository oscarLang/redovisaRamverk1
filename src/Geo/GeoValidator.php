<?php

namespace Osln\Geo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

//module for
class GeoValidator
{
    public function initialize() : void
    {
        echo "init";
    }
    public function isValidIpv4($ip) : boolean
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
    public function isValidIpv6($ip) : boolean
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }
    public function getUserIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}
