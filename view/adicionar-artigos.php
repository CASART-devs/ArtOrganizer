<?php
session_start();
require_once "../model/conexao.php";
require_once "../src/Artigo.php";
require_once "../src/Arquivo.php";

use src\Artigo\Artigo;
use src\Arquivo\Arquivo;

$titulo = $_POST['titulo-artigo'];
$autor = $_POST['autor-artigo'];

$img = $_FILES['img-previw'];
$artigo = $_FILES['artigo'];

$id_user = $_SESSION['ID'];

if (isset($_SESSION['id_pasta'])) {
    $id_pasta = $_SESSION['id_pasta'];
} else {

    $query = $conexao->prepare("
    SELECT  * FROM pasta_user 
    INNER join pastas ON pasta_user.id_pasta = pastas.id
    WHERE pasta_user.id_user = ? AND pastas.nome_pasta = 'root'

    ");
    $query->bind_param("s", $id_user);
    $query->execute();
    $resultado = $query->get_result();
    $dados = $resultado->fetch_array(MYSQLI_ASSOC);
    var_dump($dados);
    $id_pasta = $dados['id_pasta'];
}

try {


    if ((isset($img)) && (isset($artigo))) {

        $arqImg = new arquivo("../upload/artigo/img/", $img);
        $arqArtigo = new Arquivo("../upload/artigo/artigo/", $artigo);
        $arqImg->moverImg($img);
        $arqArtigo->moverImg($artigo);
        var_dump($arqArtigo);
    } else {
        die();
    }
    //adiciona pasta no banco
    $artigo = new Artigo($titulo, $autor, $arqImg->gerarNome(), $arqArtigo->gerarNome());
    $artigo->inserirArtigo($conexao);
    $id_artigo = $artigo->getId();

    //adiciona relacionamento user-pasta no banco
    $query = $conexao->prepare("INSERT INTO `artigo_pasta`(`id_pasta`, `id_artigo`) VALUES (?,?)");
    $query->bind_param("ss", $id_pasta, $id_artigo);
    $query->execute();

    header("Location: home.php");
} catch (Exception $error) {
    echo "Não foi possivel adicionar artigo $error";
}
