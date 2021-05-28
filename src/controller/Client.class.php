<?php 


class Client extends View {
    static function index() {
        global $view;
        $view->render('index.html');
    }

    static function login() {
        global $view;
        $view->render('login.html');
    }

    static function register() {
        global $view;
        $view->render('register.html');
    }

    static function explorer() {
        global $view;
        $view->render('explorar.html');
    }

    static function detalhes() {
        global $view;
        $view->render('detalhes.html');
    }

    static function profile() {
        global $view;
        $view->render('perfil.html');
    } 

    static function exit() {
        echo "exit";
    }
}
