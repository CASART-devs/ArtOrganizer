<?php
    session_start();
    require_once "conexao.php";

    $nome = $_POST['nome'];
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $nasc = $_POST['nasc'];
    $telefone = $_POST['telefone'];
    $id = $_SESSION['ID'];

    try{
        if (($nome == "") || ($nick == "") || ($email == "") || ($nasc == "") || ($telefone == "")){
            echo "Erro ao atualizar! <br>Campos não preenchido <br>";
            echo "Clique <a href='../view/pages/configuracao/configuracao.php'>aqui</a> para voltar";
        }else{
        $query = $conexao->prepare("
            UPDATE `usuarios` 
            SET Nome_Usuario = ?,Nome_Completo = ? ,Email = ?,Data_Nasc = ?, telefone =? 
            WHERE ID = ?;
        ");
        
        $query->bind_param("ssssss", $nick, $nome, $email, $nasc, $telefone, $id);
        $query->execute();

        $_SESSION['Nome'] = $nome;
        $_SESSION['Nick'] = $nick;
        $_SESSION['Email'] = $email;
        $_SESSION['Nasc'] = $nasc;
        $_SESSION['Fone'] = $telefone;

        header("Location:../view/pages/configuracao/configuracao.php");
        }
    }catch(Exception $error){
        echo "Erro ao atualizar!  ($error) <br>";
        echo "Clique <a href='../view/pages/configuracao/configuracao.php'>aqui</a> para voltar";
    }

    

    
   

    