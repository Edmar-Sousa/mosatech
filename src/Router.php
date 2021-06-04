<?php

include_once 'controller/Client.class.php';
include_once 'controller/Produto.class.php';
include_once 'controller/Upload.class.php';

$router->GET('index', 'ClientController@index');

$router->GET('login',  'ClientController@login');
$router->POST('login', 'ClientController@login_post');

$router->GET('registrar',  'ClientController@registrar');
$router->POST('registrar', 'ClientController@register_post');

$router->GET('explorar',  'ClientController@explorer');
$router->POST('explorar', 'ClientController@explorer');

$router->GET('detalhes', 'ClientController@detalhes');

$router->GET('carrinho',  'ProdutoController@carrinho');
$router->GET('delProd',   'ProdutoController@carrinho_del');
$router->POST('carrinho', 'ProdutoController@carrinho');
$router->POST('deleteProd', 'ProdutoController@delete_prod');

$router->GET('perfil', 'ClientController@profile');
$router->GET('logout', 'ClientController@exit');

$router->GET('cadProduto', 'UploadController@cadProdutos_form');
$router->POST('upload',    'UploadController@cadProdutos');

$router->ROUTE($uri);
