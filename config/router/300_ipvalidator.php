<?php
/**
 * These routes are for demonstration purpose, to show how routes and
 * handlers can be created.
 */
return [
    // All routes in order
    "routes" => [
        [
            "info" => "IP-validator",
            "mount" => "ipvalidator1",
            "handler" => "\Anax\Controller\IpValidatorController",
        ],
        [
            "info" => "IP-validator to JSON",
            "mount" => "ipvaljson",
            "handler" => "\Anax\Controller\IpValidatorControllerJson",
        ],
        [
            "info" => "IP-validator to JSON",
            "mount" => "ipgeo",
            "handler" => "\Osln\Geo\IpGeoController",
        ],
    ]
];
