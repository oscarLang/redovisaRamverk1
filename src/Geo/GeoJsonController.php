<?php

namespace Osln\Geo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class GeoJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function initialize() : void
    {
        $this->geo = new GeoValidator();
        $this->ipstack = new IpstackModule();
        $session = $this->di->get("session");
        if (!$session->has("ip")) {
            $session->set("ip", $this->geo->getUserIp());
        }
    }
    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     *
     * @return string
     */
    public function indexAction() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");

        $data = [
            "title" => "Input ip to validate",
            "ip" => $session->has("ip") ? $session->get("ip") : ""
        ];
        $page->add("osln/ipvalidator/jsongeo", $data);
        return $page->render();
    }
    public function responseActionGet() : array
    {
        $ip = $this->di->request->getGet("ip");
        $valid = "Not valid";
        if ($this->geo->isValidIpv4($ip)) {
            $valid = "Ip is valid IPV4";
        } elseif ($this->geo->isValidIpv6($ip)) {
            $valid = "Ip is valid IPV6";
        }
        $geoInfo = $this->ipstack->fetchFromIp($ip);
        $data = [
            "ip" => $geoInfo["ip"],
            "type" => $geoInfo["type"],
            "valid" => $valid,
            "latitude" => $geoInfo["latitude"],
            "longitude" => $geoInfo["longitude"],
            "country_name" => $geoInfo["country_name"],
            "city" => $geoInfo["city"],
        ];
        return [$data];
    }
}
