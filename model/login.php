<?php
    session_start();

    require_once "conexao.php";

    $email = $conexao->real_escape_string($_POST['email_log']);
    $senha = $conexao->real_escape_string($_POST['senha_log']);
    

    try {
        $query = ("SELECT * FROM usuarios WHERE Email = '$email';");
        
        $resultado = $conexao->query($query);
        $rows = $resultado->num_rows;
        
        if ($rows == 1){
            $dados = $resultado -> fetch_array(MYSQLI_ASSOC);

            
            $senha_segura = $dados['Senha'];
            
            
            if (password_verify($senha, $senha_segura)){
                $_SESSION['ID'] = $dados['ID'];
                $_SESSION['Email'] = $dados['Email'];
                $_SESSION['Nome'] = $dados['Nome_Completo'];
                $_SESSION['Nick'] = $dados['Nome_Usuario'];
                $_SESSION['Nasc'] = $dados['Data_Nasc'];    
                $_SESSION['fone'] = $dados['telefone'];
                $_SESSION['img-perfil'] =$dados['img-perfil'];

                $query = $conexao->prepare("
                SELECT * FROM pastas
                INNER JOIN pasta_user ON pastas.id = pasta_user.id_pasta
                WHERE pasta_user.id_user = ? AND pastas.nome_pasta = 'root'
                ");
                $query->bind_param("s", $_SESSION['ID'] );

                $query->execute();
                $resultado = $query->get_result();
                $dados = $resultado -> fetch_array(MYSQLI_ASSOC);

                $_SESSION['pasta_nome'] = $dados['nome_pasta'];

                
                header('location:../view/home.php');
            } else{
                header('location:../index.php');
            }
            
        }else{
            header('location:../index.php');
        }
        
    } catch (Exception $error) {
        echo "erro na query $error";
    }
        
?>