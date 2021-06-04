<?php


class Auth {
    static function logar($crfs, $email, $senha) {
        global $router;
        if (!Form::valid_crfs_token($crfs)) $router->redirect('login');

        $result = Usuario::select_usuario($email, $senha);

        if (empty($result)) 
            $router->redirect('login');

        $_SESSION['usuario_logado'] = $result[0];
        $router->redirect('index');
    }

    
    static function registrar($crfs, $nome, $email, $senha, $prioridade) {
        global $database, $router;

        if (!Form::valid_crfs_token($crfs))
            $router->redirect('registrar');

        $nivel_usuario = $prioridade == 'admin' ? 1 : 0;
        
        Usuario::insert_usuario($nome, $email, $senha, $nivel_usuario);
        $router->redirect('login');
    }


    static function logado() {
        $logado = FALSE;
        $admin  = FALSE;


        if (isset($_SESSION['usuario_logado'])) {
            $logado = TRUE;
            $admin = $_SESSION['usuario_logado']['permissaoAdmin'] == 1 ? TRUE : FALSE;
        }

        return array('logado' => $logado, 'admin' => $admin);
    }


    static function require_logado($req) {
        global $router;
        $data = self::logado();

        if ($req)
            if ($data['logado'] == FALSE)
                $router->redirect('login');

        return $data;
    }
}

