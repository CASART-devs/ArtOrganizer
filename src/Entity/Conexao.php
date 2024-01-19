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
        $this->hostname = "monorail.proxy.rlwy.net";
        $this->username = "root";
        $this->password = "f--dE2Bb641fF4A-dha2h52EDABDGhc1";
        $this->database = "railway";
        $this->port = "10624";
        try {
            return parent::__construct($this->hostname, $this->username, $this->password, $this->database, $this->port);
        } catch (mysqli_sql_exception) {
            die("Falha ao conectar ao banco de dados: " . mysqli_connect_error());
        }
    }
}