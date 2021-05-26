<?php


class ExecQuery {
    static private function query_exec($conn, $query) {
        try {
            $stmt = $conn->prepare($query);
            $run = $stmt->execute();
            return $stmt;
        }

        catch (PDOExcaption $e) {
            print_r($e->getMessage());
            die();
        }
    }

    static function find($conn, $query) {
        $stmt = self::query_exec($conn, $query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    static function insert($conn, $query) {
        self::query_exec($conn, $query);
    }
}


