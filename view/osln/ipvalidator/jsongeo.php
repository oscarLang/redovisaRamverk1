<?php

namespace Anax\View;

/**
 * Basic form input for validating ip.
 */

// Prepare classes
$classes[] = "article";
if (isset($class)) {
    $classes[] = $class;
}

?><article <?= classList($classes) ?>>
    <h1><?= $title ?></h1>
    <form method="get" action="geojson/response">
        <input type="text" name="ip" value="<?= $ip ?>">
        <input type="submit" value="Send">
    </form>
    <hr>
    <p>
        Enter a valid ip-address to get a json-response with geo information. Correct format is:
        <code>
            /ipvaljson/response?ip={ip}
        </code>
    </p>
    <a href="geojson/response?ip=193.11.185.163">Valid IPV4 address</a>
    <a href="geojson/response?ip=2001:6b0:2a:c280:30f4:7ee4:96b5:803c">Valid IPV6 address</a>
    <a href="geojson/response?ip=127.0.342234.1">Invalid IPV4 address</a>
</article>
