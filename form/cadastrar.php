<?php  
    include('conexao.php');

    $nome = $_POST['nome_cad'];
    $email = $_POST['email_cad'];
    $senha = $_POST['senha_cad'];
    $nasc = $_POST['nasc_cad'];
    $fone = $_POST['fone_cad'];
      
    $mysqli_insert = "INSERT INTO `usuarios`(`us_nome`, `us_email`, `us_senha`, `us_nasc`, `us_telefone`) VALUES ('$nome', '$email', '$senha', '$nasc', '$fone')";

    if (mysqli_query($conexao, $mysqli_insert)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
?>
