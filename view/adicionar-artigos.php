<?php
session_start();
require_once "/xampp/htdocs/artorganizer-original/model/conexao.php";

$titulo = $_POST['titulo-artigo'];
$autor = $_POST['autor-artigo'];

$imgCapa = $_FILES['img-previw'];
$artigo = $_FILES['artigo'];

$id_user = $_SESSION['ID'];
if(isset($_SESSION['id_pasta'])){
    $id_pasta = $_SESSION['id_pasta'];
}else{
    $id_pasta = 0;
}

try {

    if ((isset($imgCapa)) && (isset($artigo))) {
        $pastaImg = "../upload/artigo/img/";
        $pastaArtigo = "../upload/artigo/artigo/";
        $nomeImg = $imgCapa['name'];
        $nomeArtigo = $artigo['name'];
        $extensaoImg = '.' . strtolower(pathinfo($nomeImg, PATHINFO_EXTENSION));
        $extensaoArtigo = '.' . strtolower(pathinfo($nomeArtigo, PATHINFO_EXTENSION));
        if (!((($extensaoArtigo == '.pdf') && (($extensaoImg == '.jpg') || ($extensaoImg == '.jpeg') || ($extensaoImg == '.png') || ($extensaoImg == '.svg'))))) {
            die();
        }
            $idImg = uniqid();
            $idArtigo = uniqid();
            $novoCaminhoImg = $pastaImg . $idImg . $extensaoImg;
            $novoCaminhoArtigo = $pastaArtigo . $idArtigo . $extensaoArtigo;
            $arquivoImg =$idImg . $extensaoImg;
            $arquivoArtigo =  $idArtigo . $extensaoArtigo;
            try {
                move_uploaded_file($imgCapa['tmp_name'], $novoCaminhoImg);
                move_uploaded_file($artigo['tmp_name'], $novoCaminhoArtigo);
            } catch (Exception $error) {
                echo "Não foi possivel salvar imagem! <br> $error";
            }
        
    } else {
        die();
    }
    //adiciona pasta no banco
    $query = $conexao->prepare("
        INSERT INTO `artigos`
        (`Titulo`, `Autor`, `Data_Publicacao`, `img-previw`, `artigo-caminho`) 
        VALUES 
        (?,?,?,?,?)
            ");
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');
    $query->bind_param("sssss", $titulo, $autor, $data, $arquivoImg, $arquivoArtigo);
    $query->execute();
    $id_artigo = $conexao->insert_id;
    //adiciona relacionamento user-pasta no banco
    $query = $conexao->prepare("INSERT INTO `artigo_pasta`(`id_pasta`, `id_artigo`) VALUES (?,?)");
    $query->bind_param("ss", $id_pasta, $id_artigo);
    $query->execute();

    header("Location: home.php");

} catch (Exception $error) {
    echo "Não foi possivel criar pasta $error";
}
