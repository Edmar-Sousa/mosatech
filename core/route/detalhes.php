<?php

include_once __DIR__ . '/../classes/function.php';

if (!$logado) {
    header('Location: login');
    die();
}


include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/buscaProduto.php';

$resul = array();

if (isset($_POST['idProduto']))
    $resul = Produto::busca_id($_POST['idProduto']);

echo $twig->render(
    'detalhes.html', array(
        'logado' => $logado,
        'admin' => $admin,
        'produto' => $resul[0]
    )
);