<?php

namespace Osln\Geo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class IpstackModule
{
    public function __construct()
    {
        $this->key = require(ANAX_INSTALL_PATH . "/config/ipstack.php");
    }
    public function test()
    {
        var_dump($this->key["key"]);
    }
}
