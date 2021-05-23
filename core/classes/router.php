<?php 


class Router {
    private const BASE_URL = __DIR__ . '/../views/';

    static function index($params) {

        print_r($params[1]);
    }
}


