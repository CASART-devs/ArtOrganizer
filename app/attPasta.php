<?php
    session_start();
    require_once "conexao.php";
    require_once "../src/Artigo.php";
    require_once "../src/Arquivo.php";
    require_once "../src/RelUserPasta.php";
    
    use src\Artigo\Artigo;
    use src\Arquivo\Arquivo;
    use src\RelArtigoPasta\RelArtigoPasta;
    
    
    $id = $_SESSION['id_pasta'];

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
        header("Location:infoPasta.php");

    }catch(Exception $error){

        echo "Erro ao atualizar!  ($error) <br>";
        echo "Clique <a href='configuracao.php'>aqui</a> para voltar";
        
    }

    