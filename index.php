<?php

require_once 'vendor/autoload.php';

session_start();

require_once 'core/classes/router.php';


$uri = isset($_GET['url']) ? $_GET['url'] : 'index';
Router::index($uri);
