<?php

include_once __DIR__ . '/../classes/configTwig.php';

$logado = FALSE;

if (isset($_SESSION['usuario_logado']))
    $logado = TRUE;

echo $twig->render(
    'index.html', array('logado' => $logado )
);