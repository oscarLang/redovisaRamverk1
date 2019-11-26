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
$for = $forecast[0];
var_dump($for["daily"]["data"]);
$i = 0;
?>
<article <?= classList($classes) ?>>
    <h1><?= $title ?></h1>
    <form action="weather/response" method="get">
        <input type="text" name="location" value=<?= $location ?>>
        <input type="submit" value="submit">
    </form>

    <?php if ($forecast): ?>
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?layer=mapnik&zoom=12&amp;marker=<?=$for["latitude"]?>%2C<?=$for["longitude"]?>&zoom=12" style="border: 1px solid black">
        </iframe>
        <br/>
        <small>
            <a href="https://www.openstreetmap.org/?mlat=56.1805&amp;mlon=15.5866#map=15/56.1805/15.5866">Visa större karta</a>
        </small>
        <?php
        require "displaytable.php"
        ?>
    <?php endif; ?>
</article>
