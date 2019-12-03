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
            "info" => "Geo ip validator",
            "mount" => "ipgeo",
            "handler" => "\Osln\Geo\IpGeoController",
        ],
        [
            "info" => "Geo to json",
            "mount" => "geojson",
            "handler" => "\Osln\Geo\GeoJsonController",
        ],
    ]
];
