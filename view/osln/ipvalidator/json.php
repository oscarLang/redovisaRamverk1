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
    <form method="get" action="ipvaljson/response">
        <input type="text" name="ip" value="<?= $ip ?>">
        <input type="submit" value="Send">
    </form>
    <hr>
    <p>
        Rest API IpValidator can be used with
        <code>
            /ipvaljson/response?ip={ip}
        </code>
    </p>
    <a href="/dbwebb/ramverk1/me/redovisa/htdocs/ipvaljson/response?ip=127.0.0.1">Valid IPV4 address</a>
    <a href="/dbwebb/ramverk1/me/redovisa/htdocs/ipvaljson/response?ip=2001:db8:85a3:0:0:8a2e:370:7334">Valid IPV6 address</a>
    <a href="/dbwebb/ramverk1/me/redovisa/htdocs/ipvaljson/response?ip=127.0.342234.1">Invalid IPV4 address</a>
</article>
