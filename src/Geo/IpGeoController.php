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
        $this->ipstack->test();
        $user_ip = $this->geo->getUserIp();
        if ($user_ip != "")
        {
            $this->di->request->setGet("ip", $user_ip);
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
        $ip = $this->di->request->getGet("ip");
        $data = [
            "title" => "Input ip to validate",
            "ip" => $ip,
            "user" => $this->geo->getUserIp()
        ];

        $page->add("osln/ipvalidator/geo", $data);
        return $page->render();
    }
    public function responseActionGet() : object
    {
        $user = $this->GeoValidator->getUserIp();
        $ip = $this->di->request->getGet("ip");
        $data = [
            "ip" => $ip,
            "user" => $user
        ];

        $page = $this->di->get("page");
        $page->add("osln/ipvalidator/geo", $data);
        return $page->render();
    }
}
