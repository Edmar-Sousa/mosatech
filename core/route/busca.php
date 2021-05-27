<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/usuario.php';
include_once __DIR__ . '/../classes/function.php';
include_once __DIR__ . '/../classes/buscaProduto.php';

$resultados = array();
$pesquisa = isset($_POST['pesquisar']) ? htmlspecialchars($_POST['pesquisar']) : '';
$resultados = Produto::busca_produto($pesquisa, 10);

echo $twig->render(
    'busca.html', array(
        'logado' => $logado, 
        'admin' => $admin,
        'pesquisa' => $pesquisa,
        'resultados' => $resultados
    )
);