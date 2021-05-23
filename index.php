<?php

require_once 'core/classes/router.php';

if ($_SERVER['REQUEST_URI']) {
    $uri = $_SERVER['REQUEST_URI'];
    $array_url = explode('/', $uri);

    Router::index($array_url);
}
