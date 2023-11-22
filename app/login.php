<?php

use artorganizer\Repository\UsuarioRepository;

    $email = $conexao->real_escape_string($_POST['email_log']);
    $senha = $conexao->real_escape_string($_POST['senha_log']);
    
    try {

        $usuarioRepository = new UsuarioRepository($conexao);
        $usuario = $usuarioRepository->logar($email, $senha);
        if( $usuario != false){
            $_SESSION['user_id'] = $usuario->getId();
            $_SESSION['user_nick'] = $usuario->getNick();
            $_SESSION['user_nome'] = $usuario->getNome();
            $_SESSION['user_email'] = $usuario->getEmail();
            
            header("Location: /home");
        }else{
            header("Location: /");
        }
        
    } catch (Exception $error) {
        echo "erro na query $error";
    }
        
?>