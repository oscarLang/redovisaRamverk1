<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpValidatorTest extends TestCase
{
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new IpValidatorController();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
    }
    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {

        $req = $this->di->get("request");
        //testing if with correct IPV4 address
        $req->setGet("ip", "158.174.29.41");
        $res = $this->controller->indexAction();
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        $this->assertInstanceOf("Anax\Response\Response", $res);

        //testing if with wroong IPV4 address
        $req->setGet("ip", "158.17454.29.41");
        $res = $this->controller->indexAction();
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        $this->assertInstanceOf("Anax\Response\Response", $res);

        //testing if with correct IPV6 address
        $req->setGet("ip", "2001:db8:85a3:0:0:8a2e:370:7334");
        $res = $this->controller->indexAction();
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
    }
}
