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

//imports
require_once __DIR__ . "/../vendor/autoload.php";

use artorganizer\Entity\Conexao;
use artorganizer\Repository\{ArtigoRepository,
    PastaRepository,
    PastaUserRepository,
    TokenRepository,
    UsuarioRepository};
use artorganizer\Exception\RouteNotFoundException;

//functions
function validar(): bool
{
    if (!$_SESSION['user_id']) {
        header("Location:/logout");
        return true;
    } else {
        return false;
    }
}
try {
    //Front-controller
    session_start();
    $conexao = new Conexao();


    //instanciando repositórios
    $pastaRepository = new PastaRepository($conexao);
    $artigoRepository = new ArtigoRepository($conexao);
    $usuarioRepository = new UsuarioRepository($conexao);
    $pastaUserRepository = new PastaUserRepository($conexao);
    $tokenRepository = new TokenRepository($conexao);

    $repositorios = [
        "pastaUser" => new PastaUserRepository($conexao),
        "pasta" => new PastaRepository($conexao),
        "artigo" => new ArtigoRepository($conexao),
        "usuario" => new UsuarioRepository($conexao),
        "token" => $tokenRepository = new TokenRepository($conexao),
        "conexao" => $conexao
    ];

    $pathInfo = $_SERVER['PATH_INFO'] ?? "/";
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    $routes = require_once __DIR__ . "/../config/router.php";

    if (empty($routes["$httpMethod|$pathInfo"]))
    {
        throw new RouteNotFoundException("Pagina nao encontrada");
    }

    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($repositorios);

    $controller->processarRequisicao();

}catch (RouteNotFoundException $e){
    require_once __DIR__ . "/../views/erro404.html";
}
catch (RuntimeException|Exception $e) {
    echo $e->getMessage();
}
?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/sidebar.js"></script>
<script src="js/limpar.js"></script>

</html>