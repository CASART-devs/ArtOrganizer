<?php

namespace artorganizer\Entity;

use mysqli;
use mysqli_sql_exception;

class  Conexao extends mysqli
{
    private string $hostname;
    private string $username;
    private string $password;
    private string $database;
    private string $port;

    public function __construct()
    {
        $this->hostname = "db";
        $this->username = "root";
        $this->password = "123";
        $this->database = "artorganizer";
        $this->port = "3306";

        try {
            return parent::__construct($this->hostname, $this->username, $this->password, $this->database, $this->port);
        } catch (mysqli_sql_exception $e) {
            die("Falha ao conectar ao banco de dados: " . $e->getMessage());
        }
    }
}