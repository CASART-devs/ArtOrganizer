<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtOrganizer</title>

    <!-- bootstrap5 -->
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
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

    use artorganizer\Controller\atualizacaoController;
    use artorganizer\Controller\cadastroController;
    use artorganizer\Controller\configuracaoController;
    use artorganizer\Controller\explorarController;
    use artorganizer\Controller\homeController;
    use artorganizer\Controller\landingpageController;
    use artorganizer\Controller\loginController;
    use artorganizer\Controller\pesquisaController;
    use artorganizer\Controller\logoutController;
    use artorganizer\Repository\ArtigoRepository;
    use artorganizer\Repository\UsuarioRepository;
    use artorganizer\Repository\PastaRepository;
    

    //Front-controller

    session_start();
    require_once __DIR__ .  "/../app/conexao.php";


    //instanciando repositórios
    $pastaRepository = new PastaRepository($conexao);
    $artigoRepository = new ArtigoRepository($conexao);
    $usuarioRepository = new UsuarioRepository($conexao);
    



    if (!array_key_exists('PATH_INFO', $_SERVER) || ($_SERVER['PATH_INFO'] === '/')) {

        $controller = new landingpageController();
    } elseif (($_SERVER['PATH_INFO'] === '/login')) {

        $controller = new loginController($usuarioRepository);
    } elseif (($_SERVER['PATH_INFO'] === '/cadastrar')) {

        $controller =  new cadastroController($usuarioRepository, $pastaRepository);
    } elseif (($_SERVER['PATH_INFO'] === '/redefinir_senha')) {

        require_once __DIR__ .  "/../app/redefinir_senha.php";
    } else {

        require_once __DIR__ .  "/../app/validar.php";

        if (($_SERVER['PATH_INFO'] === '/home')) {

            require_once __DIR__ .  "/../app/navbar.php";
            $controller = new homeController($pastaRepository, $artigoRepository);
        } elseif ($_SERVER['PATH_INFO'] === '/explorar') {

            require_once __DIR__ .  "/../app/navbar.php";
            $controller =  new explorarController($artigoRepository);
        } elseif ($_SERVER['PATH_INFO'] === '/pesquisa') {

            require_once __DIR__ .  "/../app/navbar.php";
            $controller =  new pesquisaController($artigoRepository);
        } elseif ($_SERVER['PATH_INFO'] === '/logout') {

            $controller =  new logoutController();
        } elseif ($_SERVER['PATH_INFO'] === '/configuracao') {

            require_once __DIR__ .  "/../app/navbar.php";
            $controller  =  new configuracaoController();
        } elseif ($_SERVER['PATH_INFO'] === '/atualizacao') {

           $controller = new atualizacaoController($usuarioRepository);
        } elseif ($_SERVER['PATH_INFO'] === '/adicionarArtigo') {

            require_once __DIR__ .  "/../app/adicionar-artigos.php";
        } elseif ($_SERVER['PATH_INFO'] === '/informacaoArtigo') {

            require_once __DIR__ .  "/../app/navbar.php";
            require_once __DIR__ .  "/../app/infoArtigo.php";
        } elseif ($_SERVER['PATH_INFO'] === '/atualizarArtigo') {

            require_once __DIR__ .  "/../app/attArtigo.php";
        } elseif ($_SERVER['PATH_INFO'] === '/excluirArtigo') {

            require_once __DIR__ .  "/../app/excluir-artigo.php";
        } elseif ($_SERVER['PATH_INFO'] === '/adicionarPasta') {

            require_once __DIR__ .  "/../app/adicionar-pastas.php";
        } elseif ($_SERVER['PATH_INFO'] === '/informacaoPasta') {

            require_once __DIR__ .  "/../app/navbar.php";
            require_once __DIR__ .  "/../app/infoPasta.php";
        } elseif ($_SERVER['PATH_INFO'] === '/excluirPasta') {

            require_once __DIR__ .  "/../app/navbar.php";
            require_once __DIR__ .  "/../app/excluir-pasta.php";
        } elseif ($_SERVER['PATH_INFO'] === '/atualizarPasta') {

            require_once __DIR__ .  "/../app/attPasta.php";
        } elseif ($_SERVER['PATH_INFO'] === '/pegarIdExcluir') {

            require_once __DIR__ .  "/../app/pegarIdExlcuir.php";
        } elseif ($_SERVER['PATH_INFO'] === '/excluirSessao') {

            require_once __DIR__ .  "/../app/excluirSessao.php";
        } elseif ($_SERVER['PATH_INFO'] === '/voltar') {

            require_once __DIR__ .  "/../app/voltar.php";
        } elseif ($_SERVER['PATH_INFO'] === '/pegarSessao') {

            require_once __DIR__ .  "/../app/pegarSessao.php";
        } elseif ($_SERVER['PATH_INFO'] === '/recuperar') {

            require_once __DIR__ .  "/../app/recuperar.php";
        } elseif ($_SERVER['PATH_INFO'] === '/processar_solicitacao') {

            require_once __DIR__ .  "/../app/processar_solicitacao.php";
        } else {
            require_once __DIR__ .  "/../app/logout.php";
        }
    }

    if (isset($controller)) {
        $controller->processarRequisicao();
    }

    ?>

    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/index.js"></script>
    <script src="js/limpar.js"></script>

</html>