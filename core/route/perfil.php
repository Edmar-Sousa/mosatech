<?php

const BASE_URL_VIEWS = __DIR__ . '/../views';

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login');
    die();
}

$loader = new \Twig\Loader\FilesystemLoader(BASE_URL_VIEWS);
$twig = new \Twig\Environment($loader);

echo $twig->render(
    'perfil.html', array()
);