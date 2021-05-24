<?php

require_once 'vendor/autoload.php';

require_once 'core/classes/router.php';

session_start();

$uri = isset($_GET['url']) ? $_GET['url'] : 'index';
Router::index($uri);
