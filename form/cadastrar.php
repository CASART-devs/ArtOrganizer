<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $hostname = "localhost";
        $username = "root";
        $password = null;
        $database = "artorganizer";

        $mysqli = mysqli_connect($hostname, $username, $password, $database);

        
        if (mysqli_connect_errno()) {
            die("Falha ao conectar ao banco de dados: " . mysqli_connect_error());
        }

        $nome = $_POST['nome_cad'];
        $email = $_POST['email_cad'];
        $senha = $_POST['senha_cad'];

      
        $mysqli_insert = "INSERT INTO `usuarios`(`us_nome`, `us_email`, `us_senha`) VALUES ('$nome', '$email', '$senha')";


        if (mysqli_query($mysqli, $mysqli_insert)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($mysqli);
        }
    }
?>