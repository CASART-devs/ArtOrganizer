<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtOrganizer</title>

    <!-- bootstrap5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">


    <!--css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>

<body>

<?php
require_once __DIR__ . "/../vendor/autoload.php";

use artorganizer\Controller\{addArtigoController,
    addPastaController,
    attArtigoController,
    attPastaController,
    atualizacaoController,
    cadastroController,
    configuracaoController,
    excluirArtigoController,
    excluirPastaController,
    excluirSessaoController,
    explorarController,
    homeController,
    infoArtigoController,
    infoPastaController,
    landingpageController,
    loginController,
    logoutController,
    navbarController,
    pegarIdExcluir,
    pegarSessaoController,
    pesquisaController,
    processarSolicitacaoController,
    recuperarController,
    redefinirSenhaController,
    ValidarController,
    voltarController};
use artorganizer\Entity\Conexao;
use artorganizer\Repository\{ArtigoRepository,
    PastaRepository,
    PastaUserRepository,
    TokenRepository,
    UsuarioRepository};

//Front-controller

session_start();
$conexao = new Conexao("1212", "artorganizer");


//instanciando repositórios
$pastaRepository = new PastaRepository($conexao);
$artigoRepository = new ArtigoRepository($conexao);
$usuarioRepository = new UsuarioRepository($conexao);
$pastaUserRepository = new PastaUserRepository($conexao);
$tokenRepository = new TokenRepository($conexao);

$repositorios  = [
    "pastaUser" =>  new PastaUserRepository($conexao),
    "pasta" => new PastaRepository($conexao),
    "artigo" => new ArtigoRepository($conexao),
    "usuario" => new UsuarioRepository($conexao),
    "token" => $tokenRepository = new TokenRepository($conexao)
];

$pathInfo = $_SERVER['PATH_INFO'] ?? "/";
$httpMethod = $_SERVER['REQUEST_METHOD'];

$routes = require_once __DIR__ . "/../config/router.php";

$controllerClass = $routes["$httpMethod|$pathInfo"];

$controller = new $controllerClass($repositorios);

try {
    $controller->processarRequisicao();
} catch (Exception $e) {
    echo "error no controller";
}

?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/sidebar.js"></script>
<script src="js/limpar.js"></script>

</html>