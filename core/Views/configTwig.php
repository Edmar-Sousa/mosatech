<?php

const BASE_URL_VIEWS = 'src/views';
$loader = new \Twig\Loader\FilesystemLoader(BASE_URL_VIEWS);
$twig = new \Twig\Environment($loader);

echo "twing config <br>";
