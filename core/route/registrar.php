<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/formValid.php';
include_once __DIR__ . '/../classes/usuario.php';

$msg = array();

if (isset($_POST['nome'])  and  isset($_POST['email']) and 
    isset($_POST['senha']) and  isset($_POST['senha-comfirm'])) {

        $nome =  Form::clear_field($_POST['nome']);
        $email = Form::clear_field($_POST['email']);
        $senha = Form::clear_field($_POST['senha']);

        LogarUsuario::registrar($nome, $email, $senha);
}

echo $twig->render(
    'registrar.html', $msg
);