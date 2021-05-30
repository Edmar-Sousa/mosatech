<?php

include_once 'controller/Client.class.php';


$router->GET('index', 'Client@index');

$router->GET('login',  'Client@login');
$router->POST('login', 'Client@login_post');

$router->GET('registrar', 'Client@registrar');
$router->POST('registrar', 'Client@register_post');

$router->GET('explorar', 'Client@explorer');
$router->GET('detalhes', 'Client@detalhes');
$router->GET('perfil', 'Client@profile');
$router->GET('logout', 'Client@exit');

$router->ROUTE($uri);
