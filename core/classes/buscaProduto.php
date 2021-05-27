<?php

include_once __DIR__ . '/database/connectionDB.php';
include_once __DIR__ . '/database/queryExec.php';

class Produto {
    static function busca_produto($pesquisa, $n) {
        $sql = "SELECT * FROM produtos";

        if (empty($pesquisa))
            $sql .= " LIMIT $n";
        
        else
            $sql .= " WHERE nomeProduto LIKE '%$pesquisa%' LIMIT $n";

        $conn = new ConnectionDB();
        $result = ExecQuery::find($conn->connect(), $sql);
        return $result;
    }
    
    static function busca_id($id) {
        $sql = "SELECT * FROM produtos WHERE idProduto = '$id'";
        $conn = new ConnectionDB();
        $result = ExecQuery::find($conn->connect(), $sql);
        return $result;
    }
}

