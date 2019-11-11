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
    <form>
        <input type="text" name="ip" value="<?= $ip ?>">
        <input type="submit" value="Send">
    </form>
    <?php if ($ip != ""): ?>
        <p> <?= $ip ?> , Addr: <?= $host ?></p>
        <p> <?= $result ?> </p>
    <?php endif ?>
</article>
