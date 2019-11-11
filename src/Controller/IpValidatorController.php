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
        $hostAddr = "";
        if ( isset($ip) ) {
            $validIpv4 = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
            $validIpv6 = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
            $hostAddr .= gethostbyaddr($ip);
            if ( $validIpv4 ) {
                $result .= "The ip is valid IPV4";
            }
            else if ($validIpv6){
                $result .= "The ip is valid IPV6";
            }
            else {
                $result .= "The ip is not valid";
            }
        }
        $data = [
            "title" => "Input ip to validate",
            "ip" => $ip,
            "result" => $result,
            "host" => $hostAddr
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
