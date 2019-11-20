<?php

namespace Osln\Geo;

class GeoValidator
{
    public function isValidIpv4($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
    public function isValidIpv6($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }
    public function getUserIp()
    {
        $ip = getenv('HTTP_CLIENT_IP')?:
        getenv('HTTP_X_FORWARDED_FOR')?:
        getenv('HTTP_X_FORWARDED')?:
        getenv('HTTP_FORWARDED_FOR')?:
        getenv('HTTP_FORWARDED')?:
        getenv('REMOTE_ADDR');
        return $ip;
    }
    public function setSession($geoInfo, $session)
    {
        $session->set("latitude", $geoInfo["latitude"]);
        $session->set("type", $geoInfo["type"]);
        $session->set("ip", $geoInfo["ip"]);
        $session->set("longitude", $geoInfo["longitude"]);
        $session->set("country_name", $geoInfo["country_name"]);
        $session->set("city", $geoInfo["city"]);

        $valid = "Not valid";
        if ($this->isValidIpv4($geoInfo["ip"])) {
            $valid = "Ip is valid IPV4";
        } elseif ($this->isValidIpv6($geoInfo["ip"])) {
            $valid = "Ip is valid IPV6";
        }
        $session->set("valid", $valid);
    }
}
