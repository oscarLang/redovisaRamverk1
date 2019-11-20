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
    <iframe src="http://www.openstreetmap.org/export/embed.html" width="300" height="300"></iframe>
</article>
