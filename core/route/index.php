<?php

const BASE_URL_VIEWS = __DIR__ . '/../views';

$loader = new \Twig\Loader\FilesystemLoader(BASE_URL_VIEWS);
$twig = new \Twig\Environment($loader);

echo $twig->render(
    'index.html', array('title' => 'ok')
);