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

    public function __construct(string $senha, string $banco)
    {
        $this->hostname = "localhost";
        $this->username = "root";
        $this->password = $senha;
        $this->database = $banco;

        try {
            return parent::__construct($this->hostname, $this->username, $this->password, $this->database);
        } catch (mysqli_sql_exception) {
            die("Falha ao conectar ao banco de dados: " . mysqli_connect_error());
        }
    }
}