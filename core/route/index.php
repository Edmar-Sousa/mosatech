<?php

include_once __DIR__ . '/../classes/configTwig.php';
include_once __DIR__ . '/../classes/function.php';

echo $twig->render(
    'index.html', array( 'logado' => $logado, 'admin' => $admin )
);