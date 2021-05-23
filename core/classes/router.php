<?php 


class Router {
    private const BASE_URL = __DIR__ . '/../views/';

    static function index($params) {

        echo $params[1];
    }
}


