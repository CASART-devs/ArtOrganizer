<?php
     $hostname = "127.0.0.1";
     $username = "root";
     $password = '1212';
     $database = "artorganizer";

 
     $conexao = mysqli_connect($hostname, $username, $password, $database);
 
     if (mysqli_connect_errno()) {
         die("Falha ao conectar ao banco de dados: " . mysqli_connect_error());
     }
