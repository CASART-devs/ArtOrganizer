<?php
 
    require_once __DIR__ . "/../src/Artigo.php";
    require_once __DIR__ . "/../src/Arquivo.php";
    require_once __DIR__ . "/../src/RelUserPasta.php";
    
   use artorganizer\src\Arquivo;
    
    
    $id = $_SESSION['id_artigo'];

    $titulo = $_POST['nomeArtigo'];
    $autor = $_POST['autor'];

    $artigo = $_FILES['artigo'];
    $img = $_FILES['imgArtigo'];

    try{
        if (!(isset($img)) && !(isset($artigo))) {
            die();   
        }
    
        $arqImg = new arquivo(__DIR__ . "/../public/upload/artigo/img/", $img);
        $arqArtigo = new Arquivo(__DIR__ . "/../public/upload/artigo/artigo/", $artigo);
        $arqImg->moverImg($img);
        $arqArtigo->moverArtigo($artigo);
    
        
    
        
    
        
        if (($titulo == "") || ($autor == "")){
            
            die();
        }else{
            $query = $conexao->prepare("
            UPDATE `artigos`
            SET titulo = ?, autor = ?, `img-previw` = ?, `artigo-caminho` = ? 
            WHERE ID = ?
        ");
        
        $query->bind_param("ssssi", $titulo, $autor, $arqImg->gerarNome(), $arqArtigo->gerarNome(), $id);
        $query->execute();
        
       
        

        
        }
        header("Location:/informacaoArtigo");

    }catch(Exception $error){

        echo "Erro ao atualizar!  ($error) <br>";
        echo "Clique <a href='configuracao.php'>aqui</a> para voltar";
        
    }

    