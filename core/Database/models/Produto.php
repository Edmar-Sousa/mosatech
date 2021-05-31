<?php


class Produto {
    static function busca_produto($pesquisa, $n) {
        global $database;
        $sql = "SELECT * FROM produtos";

        if (empty($pesquisa))
            $sql .= " LIMIT $n";
        
        else
            $sql .= " WHERE nomeProduto LIKE '%$pesquisa%' LIMIT $n";

        $result = ExecQuery::find($database->connect(), $sql);
        return $result;
    }
    
    static function busca_id($id) {
        global $database;
        $sql = "SELECT * FROM produtos WHERE idProduto = '$id'";

        $result = ExecQuery::find($database->connect(), $sql);
        return $result;
    }

    static function delete_produto($id, $src) {
        global $database;
        $sql = "DELETE FROM produtos WHERE idProduto = '$id'";

        ExecQuery::find($database->connect(), $sql);
        unlink($src);
    }

    static function cadastrar_produto($id, $nomeProduto, $cameProduto, $procProduto, $RAMProduto, $telaProduto, $armaProduto, $nameUpload, $preco) {
        global $database;
        $sql = "INSERT INTO produtos(idProduto, nomeProduto, cameraProduto, procesProduto, menRamProduto, telaDoProduto,  armazeProduto, imgSrc, precoProduto) VALUES ('$id', '$nomeProduto', '$cameProduto', '$procProduto', '$RAMProduto', '$telaProduto', '$armaProduto', '$nameUpload', '$preco')";
        
        ExecQuery::insert($database->connect(), $sql);
    }
}