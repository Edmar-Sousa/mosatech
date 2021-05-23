<?php 


class Router {
    private const BASE_URL = __DIR__ . '/../views/';

    static function index($params) {

        if (file_exists(self::BASE_URL . $params[1] . '.html'))
            echo "ok";

        else 
            echo "nao ok";
    }
}


