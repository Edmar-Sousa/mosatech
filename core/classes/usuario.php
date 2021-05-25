<?php

include_once __DIR__ . '/database/connectionDB.php';
include_once __DIR__ . '/database/queryExec.php';


class LogarUsuario {
    static function logar($email, $senha) {
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

    static function registrar($nome, $email, $senha) {
        $id = uniqid();

        $sql = "INSERT INTO usuarios(idUsuario, permissaoAdmin, nomeUsuario, email, senhaUsuario) VALUES ('$id', 0, '$nome', '$email', '$senha')";

        $database = new ConnectionDB();
        $result = ExecQuery::insert($database->connect(), $sql);
        $database = NULL;

        header('Location: login');
        die();
    }
}


