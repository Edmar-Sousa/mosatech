<?php 


class Client {
    static function index() {
        View::render('index');
    }

    static function login() {
        echo "login.html <br>";
    }

    static function register() {
        echo "register.html <br>";
    }

    static function explorer() {
        echo "explorar.html <br>";
    }

    static function detalhes() {
        echo "detalhes.html <br>";
    }

    static function profile() {
        echo "perfil.html <br>";
    } 

    static function exit() {
        echo "exit";
    }
}
