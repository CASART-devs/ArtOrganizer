<?php
    $hostname = "127.0.0.1";
    $username = "root";
    $password = 123456;
    $database = "artorganizer";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $mysqli = mysqli_connect($hostname, $username, $password, $database);

    if (mysqli_connect_errno()) {
        die("Falha ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    $mysql_query = "SELECT id_usuario, us_email, us_senha FROM usuarios WHERE us_email = '$email' LIMIT 1";
$result = mysqli_query($mysqli, $mysql_query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    if ($senha === $user['us_senha']) { // Verifica a senha (simplificado, não seguro)
        // Login bem-sucedido
        $_SESSION['user_id'] = $user['id_usuario']; // Armazena o ID do usuário na sessão
        header("Location: cadastrar.html"); // Redireciona após o login
        exit();
    } else {
        // Senha incorreta
        echo "Senha incorreta!";
    }
} else {
    // Usuário não encontrado
    echo "Usuário não encontrado!";
}

/*
    $mysql_email = "select us_email from usuarios where us_email = '$email'";
    $mysql_senha = "select us_senha from usuarios where us_senha = '$senha'";

 
    if(($email == mysqli_query($mysqli, $mysql_email)) & ($senha == mysqli_query($mysqli, $mysql_senha))){
        //abre o site
        echo "teste";
    }*/
?>