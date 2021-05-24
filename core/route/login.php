<?php

include_once __DIR__ . '/../classes/logarUsuario.php';

if (isset($_POST['email']) and isset($_POST['senha'])) {
    LogarUsuario::logar($_POST['email'], $_POST['senha']);
}


const BASE_URL_VIEWS = __DIR__ . '/../views';
$loader = new \Twig\Loader\FilesystemLoader(BASE_URL_VIEWS);
$twig = new \Twig\Environment($loader);

echo $twig->render(
    'login.html', array('title' => 'ok')
);