<?php

include_once __DIR__ . '/database/connectionDB.php';
include_once __DIR__ . '/database/queryExec.php';

include_once 'formValid.php';

class LogarUsuario {

    static private function crfs_validate($crfs, $route) {
        if (!Form::valid_crfs_token($crfs)) {
            header("Location: $route");
            die();
        }
    }


    static function logar($crfs, $email, $senha, $route) {
        self::crfs_validate($crfs, $route);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senhaUsuario = '$senha'";

        $database = new ConnectionDB();
        $result = ExecQuery::find($database->connect(), $sql);
        $database = NULL;

        if (empty($result)) {
            header('Location: login');
            die();
        }
        

        $_SESSION['usuario_logado'] = $result[0];
        header('Location: index');
        die();
    }

    
    static function registrar($crfs, $nome, $email, $senha, $route) {
        self::crfs_validate($crfs, $route);
        $id = uniqid();

        $sql = "INSERT INTO usuarios(idUsuario, permissaoAdmin, nomeUsuario, email, senhaUsuario) VALUES ('$id', 0, '$nome', '$email', '$senha')";

        $database = new ConnectionDB();
        $result = ExecQuery::insert($database->connect(), $sql);
        $database = NULL;

        header('Location: login');
        die();
    }
}


