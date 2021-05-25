<?php

include_once __DIR__ . '/../classes/configTwig.php';

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login');
    die();
}

echo $twig->render(
    'perfil.html', array('user' => $_SESSION['usuario_logado'], 'logado' => TRUE)
);