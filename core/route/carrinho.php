<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/function.php';


if (!$logado) {
    header('Location: login');
    die();
}


echo $twig->render(
    'carrinho.html', array('logado' => $logado, 'admin' => $admin)
);