<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                ],
            ],
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "IP",
            "url" => "ipvalidator1",
            "title" => "Ip-validator.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Standard",
                        "url" => "ipvalidator1",
                        "title" => "Ip-validator.",
                    ],
                    [
                        "text" => "JSON",
                        "url" => "ipvaljson",
                        "title" => "Ip-validator with JSON.",
                    ],
                    [
                        "text" => "Geo",
                        "url" => "ipgeo",
                        "title" => "Ip Geo Locator.",
                    ],
                    [
                        "text" => "GeoJson",
                        "url" => "geojson",
                        "title" => "Ip Geo Locator with json respnse.",
                    ],
                ],
            ],
        ],
        [
            "text" => "Väder",
            "url" => "weather",
            "title" => "Väder",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Standard",
                        "url" => "weather",
                        "title" => "Weather.",
                    ],
                    [
                        "text" => "JSON",
                        "url" => "jsonweather",
                        "title" => "Json.",
                    ],
                ]
            ]
        ],
        [
            "text" => "Book",
            "url" => "book",
            "title" => "Books.",
        ],
        [
            "text" => "Styleväljare",
            "url" => "style",
            "title" => "Välj stylesheet.",
        ],
        [
            "text" => "Verktyg",
            "url" => "verktyg",
            "title" => "Verktyg och möjligheter för utveckling.",
        ],
    ],
];
