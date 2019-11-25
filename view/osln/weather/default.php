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
    <form action="weather/response" method="get">
        <input type="text" name="location" value=<?= $location ?>>
        <input type="submit" value="submit">
    </form>
    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=15.57518005371094%2C56.176222527214534%2C15.595264434814455%2C56.18418848712962&amp;layer=mapnik" style="border: 1px solid black">
    </iframe>
    <br/>
    <small>
        <a href="https://www.openstreetmap.org/#map=16/56.1802/15.5852">Visa större karta</a>
    </small>
</article>
