<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtOrganizer</title>
    <!-- bootstrap5 -->
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <!-- fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">


    <!--css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/recuperacao.css">
</head>
<body>
    


<?php
session_start();
require_once "conexao.php";

require_once "validar.php";


$token = $_GET['token'];

function verificarTokenValido($token)
{
    $conexao = new mysqli('localhost', 'root', '1212', 'artorganizer');
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
    $conexao = new mysqli('localhost', 'root', '1212', 'artorganizer');

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
    header('Location:logout.php');
} else {
    // Exiba o formulário para redefinir a senha
    echo "<div class='d-flex justify-content-center align-items-center' id='base'>

    
    <div  id='recu'>
        <form  method='post' >
            

                <div class='m-3 row' >
                    <h1>Recuperação de senha</h1>
                </div>
                <div class='m-3 row'>
                    <label for='nova_senha' class='row col-form-label'>Nova Senha:</label>
                    <div class='row'>
                        <input type='text' class='form-control' name='nova_senha' id='nova_senha' placeholder='senha' required>
                    </div>
                </div>
                
                <div class='mt-5 m-3 row'>
                    <div class='offset-sm-4 col-sm-8 d-flex justify-content-end'>
                        
                        <button type='submit' class='btn button m-2'>redefinição de senha</button>
                    </div>
                </div>
            
        </form>
    </div>

</div>
";
}
?>
</body>
</html>