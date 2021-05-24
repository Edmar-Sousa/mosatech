<?php

class Router {
    private const BASE_URL_VIEWS = __DIR__ . '/../route/';
    private const BASE_URL_ERROR = __DIR__ . '/../views/error/';

    private static function split_url($uri) {
        $array = explode('/', $uri);
        return $array;
    }


    static function index($params) {
        $file_name = self::split_url($params)[0];

        $path = self::BASE_URL_VIEWS . $file_name . '.php';

        if (file_exists($path))
            require_once $path;
        
        else 
            require_once self::BASE_URL_ERROR . '/error.html';
    }
}