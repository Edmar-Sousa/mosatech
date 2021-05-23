<?php

class Router {
<<<<<<< HEAD
    private const BASE_URL_VIEWS = __DIR__ . '/../views/';

    private static function split_url($uri) {
        $array = explode('/', $uri);
        return $array;
=======
    private const BASE_URL = __DIR__ . '/../views/';

    static function index($params) {
        // print_r($params[2]);

        $file_name = empty($params[2]) ? 'index' : $params[2];

        $path = self::BASE_URL . $file_name . '.html';
        if (file_exists($path))
            require_once $path;

        else 
            echo "nao ok";
>>>>>>> fac2fc40575aad443d05aa6aa41cd1f88ae434ca
    }

    static function index($params) {
        $file_name = self::split_url($params)[0];
        $path = self::BASE_URL_VIEWS . $file_name . '.html';

        if (file_exists($path))
            require_once $path;
    }
}