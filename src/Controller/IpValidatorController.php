<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class IpValidatorController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

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
        $result = "";
        if ( isset($ip) ) {
            $valid = filter_var($ip, FILTER_VALIDATE_IP);
            if ( $valid ) {
                $result .= "The ip is valid";
            }
            else {
                $result .= "The ip is not valid";
            }
        }
        $data = [
            "title" => "Input ip to validate",
            "ip" => $ip,
            "result" => $result
        ];

        $page->add("osln/ipvalidator/default", $data);
        return $page->render();
    }


    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     *
     * @return object
     */
    public function pageActionGet() : object
    {
        $page = $this->di->get("page");
        $ip = $this->di->request->getGet("ip");
        $data = [
            "title" => "Input ip to validate",
            "ip" => $ip
        ];

        $page->add("osln/ipvalidator/default", $data);
        return $page->render();
    }
}
