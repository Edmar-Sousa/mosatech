<?php

include_once 'Route/Router.class.php';

include_once 'Views/Views.class.php';

$router = new Router();
$uri = isset($_GET['url']) ? $_GET['url'] : 'index';
