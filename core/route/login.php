<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/formValid.php';
include_once __DIR__ . '/../classes/usuario.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST')
    if (isset($_POST['email']) and isset( $_POST['senha']) and isset($_POST['csrf'])) {
        $email = Form::clear_field($_POST['email']);
        $senha = Form::clear_field($_POST['senha']);
        $crfs = $_POST['csrf'];

        LogarUsuario::logar($crfs, $email, $senha, 'login');
    }


echo $twig->render(
    'login.html', array('csrf' => Form::gerar_token())
);