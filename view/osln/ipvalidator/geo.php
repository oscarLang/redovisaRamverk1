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
    <form action="ipgeo/response">
        <input type="text" name="ip" value="<?= $ip ?>">
        <input type="submit" value="Send">
    </form>
</article>
