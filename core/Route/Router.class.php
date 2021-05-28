<?php

class Router {
    private $router_list = array(
        'POST' => array(),
        'GET'  => array()
    );


    public static function redirect($uri) {
        header("Location: $uri");
        die();
    }


    public function GET($url, $controller_function) {
        $this->router_list['GET'][$url] = $controller_function;
    }


    public function POST($url, $controller_function) {
        $this->router_list['POST'][$url] = $controller_function;
    }


    public function ROUTE($url) {
        $method_request = $_SERVER['REQUEST_METHOD'];
        
        if (key_exists($url, $this->router_list[$method_request]) ) {
            $call_function = explode('@', $this->router_list[$method_request][$url] );

            if (method_exists($call_function[0], $call_function[1]))
                call_user_func( $call_function );

            else 
                echo "No method '{$call_function[1]}' in class '{$call_function[0]}' <br>";
        }

    }
}

