<?php


class Auth {
    static function logar($crfs, $email, $senha) {
        global $database, $router;

        if (!Form::valid_crfs_token($crfs)) $router->redirect('login');

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senhaUsuario = '$senha'";
        $result = ExecQuery::find($database->connect(), $sql);

        if (empty($result)) 
            $router->redirect('login');

        $_SESSION['usuario_logado'] = $result[0];
        $router->redirect('index');
    }

    
    static function registrar($crfs, $nome, $email, $senha) {
        global $database, $router;

        if (!Form::valid_crfs_token($crfs))
            $router->redirect('registrar');
        
        $id = uniqid();
        $sql = "INSERT INTO usuarios(idUsuario, permissaoAdmin, nomeUsuario, email, senhaUsuario) VALUES ('$id', 0, '$nome', '$email', '$senha')";
        $result = ExecQuery::insert($database->connect(), $sql);


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

}

