<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/function.php';


if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login');
    die();
}

echo $twig->render(
    'carrinho.html', array('logado' => TRUE, 'admin' => $admin)
);