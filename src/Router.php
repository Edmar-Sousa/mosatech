<?php

include_once 'controller/Client.class.php';


$router->GET('index', 'Client@index');

$router->GET('login',  'Client@login');
$router->POST('login', 'Client@login_post');

$router->GET('registrar', 'Client@registrar');
$router->POST('registrar', 'Client@register_post');

$router->GET('explorar', 'Client@explorer');
$router->POST('explorar', 'Client@explorer');

$router->GET('detalhes', 'Client@detalhes');

$router->GET('carrinho', 'Client@carrinho');
$router->GET('delProd', 'Client@carrinho_del');
$router->POST('carrinho', 'Client@carrinho');

$router->POST('deleteProd', 'Client@delete_prod');

$router->GET('perfil', 'Client@profile');
$router->GET('logout', 'Client@exit');

$router->GET('cadProduto', 'Client@cadProdutos_form');
$router->POST('upload', 'Client@cadProdutos');

$router->ROUTE($uri);
