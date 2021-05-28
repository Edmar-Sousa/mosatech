<?php

include_once 'Views/load.php';
include_once 'Route/Router.class.php';

$router = new Router();
$uri = isset($_GET['url']) ? $_GET['url'] : 'index';
