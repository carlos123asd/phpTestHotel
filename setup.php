<?php
    require 'BladeOne.php';
    use eftec\bladeone\BladeOne;

    $views = __DIR__ . '/views';
    $cache = __DIR__ . '/cache';

    $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
?>