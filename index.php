<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtOrganizer</title>

    <!-- bootstrap5 -->
    <link rel="stylesheet" href="app/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">


    <!--css-->
    <link rel="stylesheet" href="app/css/style.css">
    <link rel="stylesheet" href="app/css/home.css">
    <link rel="stylesheet" href="app/css/sidebar.css">
</head>

<?php

//Front-controller

session_start();
require_once "app/conexao.php";

if (!array_key_exists('PATH_INFO', $_SERVER) || ($_SERVER['PATH_INFO'] === '/')) {

    require_once "landingpage.php";

} elseif (($_SERVER['PATH_INFO'] === '/login')) {

    require_once "app/login.php";

} elseif (($_SERVER['PATH_INFO'] === '/cadastrar')) {

    require_once "app/cadastrar.php";

} elseif (($_SERVER['PATH_INFO'] === '/redefinir_senha')) {

    require_once "app/redefinir_senha.php";

}else {

    require_once "app/validar.php";

    if (($_SERVER['PATH_INFO'] === '/home')) {

        require_once "app/navbar.php";
        require_once "app/home.php";

    } elseif ($_SERVER['PATH_INFO'] === '/logout') {

        require_once "app/logout.php";

    } elseif ($_SERVER['PATH_INFO'] === '/configuracao') {

        require_once "app/navbar.php";
        require_once "app/configuracao.php";

    } elseif ($_SERVER['PATH_INFO'] === '/atualizacao') {

        require_once "app/atualizacao.php";

    } elseif ($_SERVER['PATH_INFO'] === '/adicionarArtigo'){
        
        require_once "app/adicionar-artigos.php";

    } elseif ($_SERVER['PATH_INFO'] === '/informacaoArtigo'){
        
        require_once "app/navbar.php";
        require_once "app/infoArtigo.php";

    } elseif ($_SERVER['PATH_INFO'] === '/atualizarArtigo'){
        
        require_once "app/attArtigo.php";

    } elseif ($_SERVER['PATH_INFO'] === '/excluirArtigo'){
        
        require_once "app/excluir-artigo.php";

    } elseif ($_SERVER['PATH_INFO'] === '/adicionarPasta'){
        
        require_once "app/adicionar-pastas.php";

    } elseif ($_SERVER['PATH_INFO'] === '/informacaoPasta'){
        
        require_once "app/navbar.php";
        require_once "app/infoPasta.php";

    } elseif ($_SERVER['PATH_INFO'] === '/excluirPasta'){
        
        require_once "app/navbar.php";
        require_once "app/excluir-pasta.php";

    } elseif ($_SERVER['PATH_INFO'] === '/atualizarPasta'){
        
        require_once "app/attPasta.php";

    } elseif ($_SERVER['PATH_INFO'] === '/voltar'){

        require_once "app/voltar.php";

    } elseif ($_SERVER['PATH_INFO'] === '/pegarSessao'){

        require_once "app/pegarSessao.php";

    } elseif ($_SERVER['PATH_INFO'] === '/recuperar') {

        require_once "app/recuperar.php";

    } elseif ($_SERVER['PATH_INFO'] === '/processar_solicitacao') {

        require_once "app/processar_solicitacao.php";

    }else{
        require_once "app/logout.php";
    }  
}

?>

<script src="app/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
<script src="app/js/sidebar.js"></script>
<script src="app/js/index.js"></script>
<script src="app/js/limpar.js"></script>

</html>