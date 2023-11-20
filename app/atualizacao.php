<?php

    $nome = $_POST['nome'];
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $nasc = $_POST['nasc'];
    $telefone = $_POST['telefone'];
    $id = $_SESSION['ID'];
    $img = $_FILES['img-perfil'];

    try{
        if(isset( $_FILES['img-perfil'])){
                    
            $pastaImg = __DIR__ . "/../public/upload/img-perfil/";
            $nomeArquivo = $img['name'];
            $extensao ='.'.strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

            $id_img = uniqid();
            $novoCaminho = $pastaImg.$id_img.$extensao;

            $arquivo =  $id_img.$extensao;
            move_uploaded_file($img['tmp_name'], $novoCaminho);
            
        }else{
            die();
        }
        
        if (($nome == "") || ($nick == "") || ($email == "") || ($nasc == "") || ($telefone == "")){
            die();
        }else{
            $query = $conexao->prepare("
            UPDATE `usuarios`
            SET Nome_Usuario = ?, Nome_Completo = ?, Email = ?, Data_Nasc = ?, telefone = ?, `img-perfil` = ?
            WHERE ID = ?
        ");
        
        $query->bind_param("ssssssi", $nick, $nome, $email, $nasc, $telefone, $arquivo, $id);
        $query->execute();
        
       
        $_SESSION['Nome'] = $nome;
        $_SESSION['Nick'] = $nick;
        $_SESSION['Email'] = $email;
        $_SESSION['Nasc'] = $nasc;
        $_SESSION['Fone'] = $telefone;
        $_SESSION['img-perfil'] = $arquivo;

        header("Location:/configuracao");
        }
    }catch(Exception $error){

        echo "Erro ao atualizar!  ($error) <br>";
        echo "Clique <a href='configuracao.php'>aqui</a> para voltar";
        
    }

    

    
   

    