<?php

require_once "../../../model/conexao.php";
session_start();
require_once "../../../model/validar.php";


$token = $_GET['token'];

function verificarTokenValido($token)
{
    $conexao = new mysqli('localhost', 'root', '', 'artorganizer');
    $sql = "SELECT * FROM rec_senha WHERE token = ? AND data_expiracao > NOW()";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {   
        return true;
    } else {
        return false;
    }
}

function armazenarSenhaComSeguranca($usuarioId, $novaSenha) {
    // Use a função password_hash para criar um hash seguro da senha
    $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

    // Conecte-se ao banco de dados (substitua com suas configurações)
    $conexao = new mysqli('localhost', 'root', '', 'artorganizer');

    // Verifique a conexão
    if ($conexao->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
    }

    // Atualize a senha do usuário no banco de dados com o hash seguro
    $sql = "UPDATE usuarios SET senha = ? WHERE ID = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('si', $senhaHash, $usuarioId);

    if ($stmt->execute()) {
        // Senha atualizada com sucesso
        $stmt->close();
        $conexao->close();
        return true;
    } else {
        // Erro ao atualizar a senha
        $stmt->close();
        $conexao->close();
        return false;
    }
}

if (!(verificarTokenValido($token))) {
    echo "Token inválido ou expirado.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receba a nova senha do formulário
    $novaSenha = $_POST['nova_senha'];

    // Armazene a nova senha com segurança no banco de dados
    armazenarSenhaComSeguranca($_SESSION['ID'], $novaSenha);

    // Exiba uma mensagem de sucesso
    echo "Senha redefinida com sucesso!";
    header('Location:../../../model/logout.php');
} else {
    // Exiba o formulário para redefinir a senha
    echo "<form method='post'>
        <label for='nova_senha'>Nova Senha:</label>
        <input type='password' id='nova_senha' name='nova_senha' required>
        <input type='submit' value='Redefinir Senha'>
    </form>";
}
