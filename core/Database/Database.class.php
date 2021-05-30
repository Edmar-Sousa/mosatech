<?php

class Database {
    private $host;
    private $dbname;
    private $dbuser;
    private $dbsenha;

    function __construct() {
        $pathConfig = __DIR__ . '/configdb.ini';

        if (file_exists($pathConfig)) {
            $data = parse_ini_file($pathConfig);

            $this->host    = $data['host'];
            $this->dbname  = $data['dbname'];
            $this->dbuser  = $data['dbuser'];
            $this->dbsenha = $data['dbsenha'];
        }
    }

    function connect() {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->dbuser, $this->dbsenha);
            return $conn;
        }

        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }

    }
}


