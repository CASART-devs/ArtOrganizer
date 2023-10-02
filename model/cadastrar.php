<?php
include('conexao.php');

$nome = $_POST['nome_cad'];
$email = $_POST['email_cad'];
$senha = $_POST['senha_cad'];
$nasc = $_POST['nasc_cad'];
$user = $_POST['user_cad'];

try {
    $mysqli_insert = $conexao->prepare("INSERT INTO `Usuarios`(`nome_Usuario`, `Senha`, `Nome_Completo`, `Email`, `Data_nasc`) VALUES (?, ?, ?, ?, ?);");
    $mysqli_insert->bind_param("sssss", $user, $senha, $nome, $email, $nasc);

    if ($mysqli_insert->execute()) {
        echo "Inserção bem-sucedida!";

    //aqui será redirecionado para o login

    } else {
        echo "Erro ao inserir os dados no banco de dados.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
