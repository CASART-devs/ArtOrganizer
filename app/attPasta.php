<?php  
  
    $id = $_SESSION['id_infopasta'];

    $nome = $_POST['nomePasta'];
    $desc = $_POST['desc'];

    

    try{

        
    
        
        if (($nome == "") || ($desc == "")){
            
            die();
        }else{
            $query = $conexao->prepare("
            UPDATE `pastas`
            SET nome_pasta = ?, descricao = ? 
            WHERE ID = ?
        ");
        
        $query->bind_param("ssi", $nome, $desc, $id);
        $query->execute();
        
       
        

        
        }
        header("Location:/informacaoPasta");

    }catch(Exception $error){

        echo "Erro ao atualizar!  ($error) <br>";
        echo "Clique <a href='configuracao.php'>aqui</a> para voltar";
        
    }

    