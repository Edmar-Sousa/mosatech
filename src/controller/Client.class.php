<?php 

include_once 'core/Form/Form.class.php';

class Client extends View {
    static function index() {
        global $view;

        $user_login = Auth::logado();
        $view->render('index.html', $user_login);
    }
    

    static function login() {
        global $view;
        $view->render('login.html', array('csrf' => Form::gerar_token()));
    }


    static function login_post() {
        global $router;

        $campos = array('csrf', 'email', 'senha');
        $data = Form::isset_fields($campos);

        if ($data == FALSE or empty($data))
            $router->redirect('login');

        Auth::logar($data['csrf'], $data['email'], $data['senha']);
    }


    static function registrar() {
        global $view;
        $view->render('registrar.html', array('csrf' => Form::gerar_token()));
    }

    static function register_post() {
        $campos = array('csrf', 'nome', 'email', 'senha');
        $data = Form::isset_fields($campos);

        Auth::registrar($data['csrf'], $data['nome'], $data['email'], $data['senha']);
    }

    static function explorer() {
        global $view;
        $view->render('busca.html');
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
        global $router;
        session_destroy();
        $router->redirect('index');
    }
}
