<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/usuario.php';

$logado = FALSE;

if (isset($_SESSION['usuario_logado']))
    $logado = TRUE;


echo $twig->render(
    'busca.html', array('logado' => $logado)
);