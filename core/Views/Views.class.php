<?php

class View {
    private $twig;

    function __construct($twig_var) {
        $this->twig = $twig_var;
    } 

    function render($view_name, $data = array()) {
        echo $this->twig->render($view_name, $data);

        // else
        //     echo $this->twig->render('error.html', array(
        //         'title' => 'view not fould',
        //         'msg'   => "The view '{$view_name}' not exist"
        //     ));
    }
}

