<?php 


class Router {
    private const BASE_URL = __DIR__ . '/../views/';

    static function index($params) {
        // print_r($params[2]);

        $file_name = empty($params[2]) ? 'index' : $params[2];

        $path = self::BASE_URL . $file_name . '.html';
        if (file_exists($path))
            require_once $path;

        else 
            echo "nao ok";
    }
}


