<?php

namespace Osln\Geo;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class GeoControllerTest extends TestCase
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

        //$this->controller->initialize();
    }
    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        // Setup the controller
        $this->controller = new IpGeoController();
        $this->controller->setDI($this->di);
        $req = $this->di->get("request");

        $req->setGet("ip", "158.174.29.41");
        $res = $this->controller->initialize();
        $res = $this->controller->indexAction();
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
    }

    public function testResponseAction()
    {
        // Setup the controller
        $this->controller = new IpGeoController();
        $this->controller->setDI($this->di);
        $req = $this->di->get("request");
        $req->setGet("ip", "158.174.29.41");
        $this->controller->initialize();
        $res = $this->controller->responseActionGet();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }
}
