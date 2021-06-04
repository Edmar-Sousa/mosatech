<?php

class ProdutoController {
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


    
}


