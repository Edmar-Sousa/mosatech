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


    static function carrinho() {
        global $view;
        $user_login = Auth::require_logado(TRUE);

        if (!isset($_SESSION['carrinho'][0])) 
            $_SESSION['carrinho'][0] = array();

        $campos = ['id', 'nome', 'src', 'pre'];
        $data = Form::isset_fields($campos);


        if ($data != FALSE)
            array_push($_SESSION['carrinho'][0], array($data['id'], $data['nome'], $data['src'], $data['pre']));

        $user_login['produto'] =  $_SESSION['carrinho'][0];
        $view->render('carrinho.html', $user_login);
    }


    private static function find_prod() {
        $index = 0;
    
        foreach ($_SESSION['carrinho'][0] as $array) {
            if (in_array($_GET['idProdDel'], $array))
                break;
            $index++;
        }
    
        return $index;
    }

    static function carrinho_del() {
        global $router;

        if (isset($_GET['idProdDel'])) {
            $pos = self::find_prod();
            unset($_SESSION['carrinho'][0][$pos]);
        }

        $router->redirect('carrinho');
    }


    static function delete_prod() {
        global $router;
        $user_login = Auth::require_logado(TRUE);

        if (empty($user_login['admin']) or !isset($_POST['idProduto']))
            $router->redirect('explorar');

        Produto::delete_produto($_POST['idProduto'], $_POST['src']);
        $router->redirect('explorar');
    }


    static function cadProdutos() {
        global $router;
        if (!Form::valid_crfs_token($_POST['csrf'])) $router->redirect('cadProduto');

        
        // upload file
        $extUploadFiles = ['jpg', 'png'];

        $file    = $_FILES['img_pro']['name'];
        $tmpName = $_FILES['img_pro']['tmp_name'];
        $extFile = pathinfo($file, PATHINFO_EXTENSION);

        // gerar novo nome
        $id = uniqid();
        $uniqid = md5($id);
        $nameUpload = "./src/uploads/{$uniqid}.{$extFile}";

        if (!in_array($extFile, $extUploadFiles)) $router->redirect('cadProduto');
        else move_uploaded_file($tmpName, $nameUpload);


        $nomeProduto = $_POST['nome'];
        $cameProduto = $_POST['camera'];
        $procProduto = $_POST['processador'];
        $RAMProduto  = $_POST['RAM'];
        $telaProduto = $_POST['tela'];
        $armaProduto = $_POST['armazenamento'];
        $preco = $_POST['preco'];

        Produto::cadastrar_produto($id, $nomeProduto, $cameProduto, $procProduto, $RAMProduto, $telaProduto, $armaProduto, $nameUpload, $preco);
        $router->redirect('cadProduto');
    }


    static function cadProdutos_form() {
        global $router, $view;
        $user_login = Auth::require_logado(TRUE);

        if (empty($user_login['admin']))
            $router->redirect('login');

        $user_login['csrf'] = Form::gerar_token();

        $view->render('cadProduto.html', $user_login);
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
