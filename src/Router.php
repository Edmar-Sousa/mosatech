<?php

include_once 'controller/Client.class.php';

$router->GET('index', 'Client@index');
$router->GET('login', 'Client@login');
$router->GET('register', 'Client@register');
$router->GET('explorar', 'Client@explorer');
$router->GET('detalhes', 'Client@detalhes');
$router->GET('perfil', 'Client@profile');
$router->GET('sair', 'Client@exit');

$router->ROUTE($uri);
