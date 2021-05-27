<?php

include_once __DIR__ . '/../classes/function.php';

if (!$logado or empty($admin)) {
    header('Location: login');
    die();
}

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/formValid.php';

echo $twig->render(
    'cadProduto.html', array(
        'logado' => $logado, 
        'admin'  => $admin,
        'csrf'   => Form::gerar_token()
    )
);
