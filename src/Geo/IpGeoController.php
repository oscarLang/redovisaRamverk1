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
class IpGeoController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function initialize() : void
    {
        $this->geo = new GeoValidator();
        $this->ipstack = new IpstackModule();
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
            "ip" => $session->has("ip") ? $session->get("ip") : "",
            "user" => $this->geo->getUserIp(),
            "latitude" => $session->has("latitude") ? $session->get("latitude") : "",
            "longitude" => $session->has("longitude") ? $session->get("longitude") : "",
            "country_name" => $session->has("country_name") ? $session->get("country_name") : "",
            "city" => $session->has("city") ? $session->get("city") : "",
        ];
        $page->add("osln/ipvalidator/geo", $data);
        return $page->render();
    }
    public function responseActionGet() : object
    {
        $session = $this->di->get("session");

        $ip = $this->di->request->getGet("ip");
        $geoInfo = $this->ipstack->fetchFromIp($ip);

        $session->set("latitude", $geoInfo["latitude"]);
        $session->set("type", $geoInfo["type"]);
        $session->set("ip", $geoInfo["ip"]);
        $session->set("longitude", $geoInfo["longitude"]);
        $session->set("country_name", $geoInfo["country_name"]);
        $session->set("city", $geoInfo["city"]);

        $resp = $this->di->get("response");
        return $resp->redirect("ipgeo");
    }
}
