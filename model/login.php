<?php
    session_start();

    require_once "conexao.php";

    $email = $conexao->real_escape_string($_POST['email_log']);
    $senha = $conexao->real_escape_string($_POST['senha_log']);

    try {
        $query = ("SELECT * FROM usuarios WHERE Email = '$email' and Senha = '$senha' ;");
        
        $resultado = $conexao->query($query);
        $rows = $resultado->num_rows;
        
        if ($rows == 1){
            $dados = $resultado -> fetch_array(MYSQLI_ASSOC);
            $_SESSION['ID'] = $dados['ID'];
            
          
           
            //header('location:../view/home.php');
            
        }else{
            header('location:../index.php');
        }
        
    } catch (Exception $error) {
        echo "erro na query $error";
    }
        
?>