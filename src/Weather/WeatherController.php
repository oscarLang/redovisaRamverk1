<?php

namespace Osln\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;
    public function initialize() : void
    {
        $this->curl = new CurlRequest();
        $this->config = new LoadConfig();
        $this->weather = new Weather();
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

        $data = [
            "title" => "Väder",
            "forecast" => $session->has("forecast") ? $session->get("forecast") : "",
        ];
        $page->add("osln/weather/default", $data);
        return $page->render();
    }

    public function responseActionGet()
    {
        $search = $this->di->request->getGet("location");
        $session = $this->di->get("session");
        if (filter_var($search, FILTER_VALIDATE_IP)) {
            $key = $this->config->getKey("ipstack");
            $url = "http://api.ipstack.com/%2\$s?access_key=%1\$s";
            $urlFinal = sprintf($url, $key, $search);
            echo $urlFinal;
            $data = $this->curl->fetch($urlFinal);
            if ($data) {
                $forecast = $this->weather->forecast($data["lat"], $data["lon"]);
                $session->set("forecast", $forecast);
            }
        } else {
            $url = "http://open.mapquestapi.com/nominatim/v1/search.php?q=%2\$s&limit=1&format=json&key=%1\$s";
            $key = $this->config->getKey("mapquest");
            $urlFinal = sprintf($url, $key, $search);
            $data = $this->curl->fetch($urlFinal);
            if ($data) {
                $forecast = $this->weather->forecast($data["lat"], $data["lon"]);
                $session->set("forecast", $forecast);
            }
        }
        return [$data];
    }
}
