<?php 

include_once 'core/Form/Form.class.php';

class ClientController {
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

        $data_user = Auth::logado();
        $data_user['csrf'] = Form::gerar_token();

        $view->render('registrar.html', $data_user);
    }


    static function register_post() {
        $campos = array('csrf', 'nome', 'email', 'senha');

        $data = Form::isset_fields($campos);
        if (!isset($_POST['prioridade']))
            $data['prioridade'] = 'normal';

        Auth::registrar($data['csrf'], $data['nome'], $data['email'], $data['senha'], $data['prioridade']);
    }
    

    static function explorer() {
        global $view;
        $data = Auth::logado();

        $pesquisa = isset($_POST['pesquisar']) ? htmlspecialchars($_POST['pesquisar']) : '';
        $result = Produto::busca_produto($pesquisa, 10);

        $data['pesquisa'] = $pesquisa;
        $data['resultados'] = $result;

        $view->render('busca.html', $data);
    }


    static function detalhes() {
        global $view;
        $data = Auth::require_logado(TRUE);

        if (isset($_GET['idProduto']))
            $data['produto'] = Produto::busca_id($_GET['idProduto'])[0];

        $view->render('detalhes.html', $data);
    }


    static function profile() {
        global $view;
        $user_login = Auth::require_logado(TRUE);
        $user_login['user'] = $_SESSION['usuario_logado'];
        $view->render('perfil.html', $user_login);
    } 

    static function exit() {
        global $router;
        session_destroy();
        $router->redirect('index');
    }
}
