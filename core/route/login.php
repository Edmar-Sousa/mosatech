<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/formValid.php';
include_once __DIR__ . '/../classes/usuario.php';


if (isset($_POST['email']) and isset( $_POST['senha'])) {
    $email = Form::clear_field($_POST['email']);
    $senha = Form::clear_field($_POST['senha']);
    LogarUsuario::logar($email, $senha);
}


echo $twig->render(
    'login.html', array('title' => 'ok')
);