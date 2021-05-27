<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/function.php';


if (!$logado) {
    header('Location: login');
    die();
}

echo $twig->render(
    'perfil.html', array('user' => $_SESSION['usuario_logado'], 'logado' => $logado, 'admin' => $admin)
);