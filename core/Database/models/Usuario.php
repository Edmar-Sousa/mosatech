<?php

class Usuario {
    static function select_usuario($email, $senha) {
        global $database;

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senhaUsuario = '$senha'";
        $result = ExecQuery::find($database->connect(), $sql);

        return $result;
    }

    static function insert_usuario($nome, $email, $senha, $prioridade) {
        global $database;

        $id = uniqid();
        $sql = "INSERT INTO usuarios(idUsuario, permissaoAdmin, nomeUsuario, email, senhaUsuario, src) VALUES ('$id', $prioridade, '$nome', '$email', '$senha', ' ')";
    

        $result = ExecQuery::insert($database->connect(), $sql);

        return $result;
    }
}
