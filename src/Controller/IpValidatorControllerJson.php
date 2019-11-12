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
class IpValidatorControllerJson implements ContainerInjectableInterface
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
        $data = [
            "title" => "Input ip to validate",
            "ip" => $ip
        ];

        $page->add("osln/ipvalidator/json", $data);
        return $page->render();
    }

    public function responseActionGet() : array
    {
        $ip = $this->di->request->getGet("ip");
        $result = "";
        $hostAddr = "";
        if ( isset($ip) && filter_var($ip, FILTER_VALIDATE_IP) ) {

            $hostAddr .= gethostbyaddr($ip);
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                $result .= "The ip is valid IPV4";
            }
            else if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
                $result .= "The ip is valid IPV6";
            }
        }
        else {
            $result .= "The ip is not valid";
        }
        $data = [
            "ip" => $ip,
            "result" => $result,
            "host" => $hostAddr
        ];

        return [$data];
    }
}
