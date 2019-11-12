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
        $ip = $this->di->request->getGet("ip");
        $result = "";
        $hostAddr = "";
        if ( isset($ip) ) {
            if ( !filter_var($ip, FILTER_VALIDATE_IP) ) {
                $result .= "The ip is not valid";
            } else {
                $hostAddr .= gethostbyaddr($ip);
                if ( filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ) {
                    $result .= "The ip is valid IPV4";
                } else if ( filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) ) {
                    $result .= "The ip is valid IPV6";
                }
            }
        }
        $data = [
            "title" => "Input ip to validate",
            "ip" => $ip,
            "result" => $result,
            "host" => $hostAddr
        ];

        $page = $this->di->get("page");
        $page->add("osln/ipvalidator/default", $data);
        return $page->render();
    }
}
