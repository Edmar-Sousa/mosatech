<?php

include_once 'configTwig.php';

class View {
    private $twig;

    function __construct($twig_var) {
        $this->twig = $twig_var;
    } 

    function render($view_name, $data = array()) {
        echo $this->twig->render($view_name, $data);
    }
}

