<?php  
    include('conexao.php');

        $nome = $_POST['nome_cad'];
        $email = $_POST['email_cad'];
        $senha = $_POST['senha_cad'];

      
        $mysqli_insert = "INSERT INTO `usuarios`(`us_nome`, `us_email`, `us_senha`) VALUES ('$nome', '$email', '$senha')";


        if (mysqli_query($conexao, $mysqli_insert)) {
            echo "Cadastro realizado com sucesso!";
            
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conexao);
            
        }
    
?>