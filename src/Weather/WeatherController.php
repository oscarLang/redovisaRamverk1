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
            "location" => "",
        ];
        $page->add("osln/weather/default", $data);
        return $page->render();
    }

    public function responseActionGet()
    {
        $search = $this->di->request->getGet("location");
        if (filter_var($search, FILTER_VALIDATE_IP)) {
            $key = $this->config->getKey("ipstack");
            $url = "http://api.ipstack.com/%2\$s?access_key=%1\$s";
            $urlFinal = sprintf($url, $key, $search);
            echo $urlFinal;
            $data = $this->curl->fetch($urlFinal);
        } else {
            // $url = "https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q=%1\$s&limit=1";
            $url = "https://nominatim.openstreetmap.org/search?q=kalmar&limit=1&format=json";
            // $urlFinal = sprintf($url, $search);
            $data = $this->curl->fetch($url);
            var_dump($data);
            echo $url;
        }
        return [$data];
    }
}
