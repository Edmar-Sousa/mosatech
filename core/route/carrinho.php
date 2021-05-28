<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/function.php';


function find_prod() {
    $index = 0;

    foreach ($_SESSION['carrinho'][0] as $array) {
        if (in_array($_GET['idProdDel'], $array))
            break;
        $index++;
    }

    return $index;
}


if (!$logado) {
    header('Location: login');
    die();
}


if (!isset($_SESSION['carrinho'][0])) 
    $_SESSION['carrinho'][0] = array();

if (isset($_GET['id']) AND isset($_GET['nome']) AND isset($_GET['src']) AND isset($_GET['pre'])) {
    array_push($_SESSION['carrinho'][0], array($_GET['id'], $_GET['nome'], $_GET['src'], $_GET['pre']));
}


if (isset($_GET['idProdDel'])) {
    $pos = find_prod();
    unset($_SESSION['carrinho'][0][$pos]);
}

echo $twig->render(
    'carrinho.html', array(
        'logado' => $logado, 
        'admin' => $admin,
        'produto' => $_SESSION['carrinho'][0]
    )
);