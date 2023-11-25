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


if (!array_key_exists('PATH_INFO', $_SERVER) || ($_SERVER['PATH_INFO'] === '/')) {

    $controller = new landingpageController();
} elseif (($_SERVER['PATH_INFO'] === '/login')) {

    $controller = new loginController($usuarioRepository);
} elseif (($_SERVER['PATH_INFO'] === '/cadastrar')) {

    $controller = new cadastroController($usuarioRepository, $pastaRepository);
} elseif (($_SERVER['PATH_INFO'] === '/redefinir_senha')) {

    $controller = new redefinirSenhaController($conexao);
} else {

    $validar = new ValidarController();


    if (($_SERVER['PATH_INFO'] === '/home')) {

        $navbar = new navbarController();
        $controller = new homeController($pastaRepository, $artigoRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/explorar') {

        $navbar = new navbarController();
        $controller = new explorarController($artigoRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/pesquisa') {

        $navbar = new navbarController();
        $controller = new pesquisaController($artigoRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/logout') {

        $controller = new logoutController();
    } elseif ($_SERVER['PATH_INFO'] === '/configuracao') {

        $navbar = new navbarController();
        $controller = new configuracaoController();
    } elseif ($_SERVER['PATH_INFO'] === '/atualizacao') {

        $controller = new atualizacaoController($usuarioRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/adicionarArtigo') {

        $controller = new addArtigoController($artigoRepository, $pastaUserRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/informacaoArtigo') {

        $navbar = new navbarController();
        $controller = new infoArtigoController($artigoRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/atualizarArtigo') {

        $controller = new attArtigoController($artigoRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/excluirArtigo') {

        $controller = new excluirArtigoController($artigoRepository, $pastaUserRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/adicionarPasta') {

        $controller = new addPastaController($pastaRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/informacaoPasta') {

        $navbar = new navbarController();
        $controller = new infoPastaController($pastaRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/excluirPasta') {

        $navbar = new navbarController();
        $controller = new  excluirPastaController($pastaRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/atualizarPasta') {

        $controller = new  attPastaController($pastaRepository);
    } elseif ($_SERVER['PATH_INFO'] === '/pegarIdExcluir') {

        $controller = new  pegarIdExcluir();
    } elseif ($_SERVER['PATH_INFO'] === '/excluirSessao') {

        $controller = new  excluirSessaoController();
    } elseif ($_SERVER['PATH_INFO'] === '/voltar') {

        $controller = new voltarController();
    } elseif ($_SERVER['PATH_INFO'] === '/pegarSessao') {

        $controller = new  pegarSessaoController();
    } elseif ($_SERVER['PATH_INFO'] === '/recuperar') {

        $controller = new  recuperarController();
    } elseif ($_SERVER['PATH_INFO'] === '/processar_solicitacao') {

        $controller = new processarSolicitacaoController($tokenRepository);
    } else {
        $controller = new logoutController();
    }
}

try {
    $controller->processarRequisicao();
} catch (Exception $e) {
    echo "error no controller";
}

?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/sidebar.js"></script>
<script src="js/index.js"></script>
<script src="js/limpar.js"></script>

</html>