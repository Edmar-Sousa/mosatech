<?php

session_start();

include_once 'Database/Database.class.php';

$database = new Database();

include_once 'Views/load.php';
include_once 'Database/ExecQuery.class.php';
include_once 'Form/Form.class.php';
include_once 'Route/Router.class.php';

$router = new Router();

include_once 'Auth/Auth.class.php';

$uri = isset($_GET['url']) ? $_GET['url'] : 'index';
