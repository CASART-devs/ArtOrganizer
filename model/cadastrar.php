<?php
include('conexao.php');

$nome = $conexao->real_escape_string($_POST['nome_cad']);
$email = $conexao->real_escape_string($_POST['email_cad']);
$senha = $conexao->real_escape_string($_POST['senha_cad']);
$senha_segura = password_hash($senha, PASSWORD_DEFAULT);
$nasc = $conexao->real_escape_string($_POST['nasc_cad']);
$user = $conexao->real_escape_string($_POST['user_cad']);



try {
    $mysqli_insert = $conexao->prepare("INSERT INTO `Usuarios`(`nome_Usuario`, `Senha`, `Nome_Completo`, `Email`, `Data_nasc`) VALUES (?, ?, ?, ?, ?);");
    $mysqli_insert->bind_param("sssss", $user, $senha_segura, $nome, $email, $nasc);

    if ($mysqli_insert->execute()) {
        
        header("location:../index.php");
    

    } else {
        header("location:../index.php");
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
