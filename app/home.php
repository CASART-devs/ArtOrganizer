<?php
session_start();

require_once "validar.php";
require_once "conexao.php";


//pesquisa de pastas
$pastas_query = $conexao->prepare("SELECT pastas.* FROM pastas INNER JOIN pasta_user ON pastas.id = pasta_user.id_pasta WHERE pasta_user.id_user = ?;");
$pastas_query->bind_param("s", $_SESSION['ID']);
$pastas_query->execute();
$resultPasta = $pastas_query->get_result();
$rowsPasta = $resultPasta->fetch_all(MYSQLI_ASSOC);

//pesquisa de artigos
if (isset($_SESSION['id_pasta'])) {
    $id_pasta = $_SESSION['id_pasta'];
    $artigo_query = $conexao->prepare("
            SELECT * FROM artigos
            INNER JOIN artigo_pasta ON artigos.ID = artigo_pasta.id_artigo
            INNER JOIN pastas ON pastas.id = artigo_pasta.id_pasta
            INNER join pasta_user ON pastas.id = pasta_user.id_pasta
            WHERE artigo_pasta.id_pasta = ? AND pasta_user.id_user = ?; 
        ");
    $artigo_query->bind_param("ss", $id_pasta, $_SESSION['ID']);
    $artigo_query->execute();
    $resultArtigo = $artigo_query->get_result();
    $rowsArtigo = $resultArtigo->fetch_all(MYSQLI_ASSOC);
} else {
    $artigo_query = $conexao->prepare("
            SELECT * FROM artigos
            INNER JOIN artigo_pasta ON artigos.ID = artigo_pasta.id_artigo
            INNER JOIN pasta_user ON artigo_pasta.id_pasta = pasta_user.id_pasta
            INNER JOIN pastas ON artigo_pasta.id_pasta = pastas.id
            WHERE pastas.nome_pasta = 'root' AND pasta_user.id_user = ?
        ");
    $artigo_query->bind_param("s", $_SESSION['ID']);
    $artigo_query->execute();
    $resultArtigo = $artigo_query->get_result();
    $rowsArtigo = $resultArtigo->fetch_all(MYSQLI_ASSOC);
}



?>

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
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg color-nav">
        <div class="container-fluid">
            <div class="col-md-2">
                <a class="navbar-brand " href="#">
                    <img src="img/LOGOS/logo.png" alt="Logo" width="200rem" height="70rem" class="mx-3 d-inline-block align-text-top">

                </a>
            </div>
            <form class=" d-flex col-md-6">
                <input class="form-control me-2 mx-3" id="pesquisa" type="search" placeholder="Pesquisa" aria-label="Search">
                <button class="btn button-nav my-2 my-sm-0 col-2" type="submit">Pesquisa</button>
                <!-- aqui terá php, para enviar uma pesquisa para a tabela artigos e retornara os artigos na aba de pesquisa -->
            </form>
            <div class="ml-2 col-md-2  menu-icons">
                <!--<img class="m-1" src="img/navbar_home/notificação.svg" alt="Notificação" height="30rem">-->

                <div class="dropstart">
                    <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="m-1 mx-4 img-perfil" src="<?php if (isset($_SESSION['img-perfil'])) { ?>../upload/img-perfil/<?php echo $_SESSION['img-perfil'];
                                                                                                                                } else {
                                                                                                                                    echo "img/navbar_home/perfil.svg";
                                                                                                                                } ?>" alt="perfil" height="50rem">
                    </a>

                    <ul class="dropdown-menu">
                        <li><span class="m-2"><?php echo "@" . $_SESSION['Nick']; ?></span></li>
                        <li><a class="dropdown-item" href="logout.php">Sair</a></li>

                    </ul>
                </div>

                <a href="configuracao.php"><img class="m-1" src="img/navbar_home/config.svg" alt="Configurações" height="30rem"></a>
            </div>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="adicionar-artigo" tabindex="-1" aria-labelledby="adicionarArtigolLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo artigo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" action="adicionar-artigos.php" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="" class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo-artigo" id="titulo-artigo" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">insira o nome do artigo</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Autor</label>
                            <input type="text" class="form-control" name="autor-artigo" id="autor-artigo" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">insira o nome do autor do artigo</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Capa do artigo</label>
                            <input type="file" class="form-control" name="img-previw" id="img-previw" placeholder="" aria-describedby="fileHelpId">
                            <div id="fileHelpId" class="form-text">Insira uma capa para o artigo</div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Artigo</label>
                            <input type="file" class="form-control" name="artigo" id="artigo" placeholder="" aria-describedby="fileHelpId" ">
                            <div id=" fileHelpId" class="form-text">Insira o artigo .pdf
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn button">Adicionar</button>
            </div>
            </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="adicionar-pasta" tabindex="-1" aria-labelledby="adicionarPastaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nova pasta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="adicionar-pastas.php" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="nome-artigo" class="form-label">Nome da pasta</label>
                            <input type="text" class="form-control" name="nome-pasta" id="nome-artigo" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Insira o nome da pasta</small>
                        </div>

                        <div class="mb-3">
                            <label for="desc-pasta" class="form-label">Descrição da pasta</label>
                            <textarea class="form-control" name="desc-pasta" id="desc-pasta" rows="3"></textarea>
                            <small class="helpId">Inisira uma descrição</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn button">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    


    <div class="container-fluid pt-3">
        <div class="row">


            <!-- conteudo principal-->


            <div class="col  mx-5" id="content">
                <div class="row my-4" id="head">
                    <div class="col">
                        <div class="row">

                            <span class="h1 m-2">Biblioteca
                                <?php print " do(a) " . $_SESSION['Nick']; ?>

                            </span>
                            <?php if (isset($_SESSION['id_pasta'])) { ?>
                                <a type="button" id="btnVoltar" class="btn button col-2 mx-3" href="voltar.php"> voltar </a>
                            <?php } ?>
                            <div class="row">
                            </div>

                            <!-- tags
                                <div class="row">
                                <!-- aqui terá php, para pegar as tags, e amigos do banco de dados 
                                e fazer a pesquisa pelos seletores 

                                <div class="col">
                                    <select class="filtro form-select form-select-lg m-2" name="" id="">
                                        <option selected>Tipo</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>


                                <div class="col">
                                    <select class="filtro form-select form-select-lg m-2" name="" id="">
                                        <option selected>Tempo</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <select class="filtro form-select form-select-lg m-2" name="" id="">
                                        <option selected>pessoas</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>

                            </div>-->

                        </div>
                    </div>

                    <div class="col" id="head-right">

                        <div class="dropdown"> <!-- aqui tera php, para adicionar artigos e pastas -->
                            <button class="btn button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Adicionar Artigos
                            </button>

                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adicionar-artigo">Adicionar artigo</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adicionar-pasta">Adicionar pasta</a></li>

                            </ul>


                        </div>


                    </div>
                </div>

                <!-- Pastas -->
                <div class="row">
                    <div class="col">
                        <?php if (!isset($_SESSION['id_pasta'])){ ?>
                        <div class="row">
                            <div class="grupo-conteudo my-2">

                                <a data-bs-toggle="collapse" data-bs-target="#pastas" aria-expanded="false" aria-controls="pastas">
                                    <div class="btn-alternar">
                                        <svg class="icone-alternar" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                                        </svg>
                                        <span class="txt-esconder-pasta">Pastas</span>
                                    </div>
                                </a>


                            </div>
                        </div>
                        <?php } ?>
                        <div class="d-flex flex-row " id="pastas">

                            <!-- mostra as pastas que do  usuario -->
                            <?php if (!(isset($_SESSION['id_pasta']))) { ?>
                                <?php foreach ($rowsPasta as $pasta) {
                                    if ($pasta['nome_pasta'] != 'root') { ?>

                                        <form method="post" action="pegarSessao.php" class="m-2 ">

                                            <button type="submit" name="id_pasta" value="<?php echo $pasta['id']; ?>" class="btn button  btnPasta d-flex justify-content-between align-items-center">
                                                <span><?php echo $pasta['nome_pasta']; ?></span>

                                                <div class="dropdown">
                                                    <a class="" id="toggle-opcoes" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </a>

                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"   href="#">Informaçãoes</a></li>
                                                        <li><a class="dropdown-item" href="excluir-pasta.php?id_pasta=<?= $pasta['id'];?>">Excluir</a></li>

                                                    </ul>
                                                </div>
                                            </button>

                                        </form>
                            <?php }
                                }
                            } ?>


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="grupo-conteudo my-2">

                                <a data-bs-toggle="collapse" data-bs-target="#artigos" aria-expanded="false" aria-controls="artigos">
                                    <div class="btn-alternar">
                                        <svg class="icone-alternar" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                                        </svg>
                                        <span class="txt-esconder-pasta">Artigos</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row" id="artigos">
                            <!--Mostra os artigos do usuario-->

                            <?php foreach ($rowsArtigo as $artigo) { ?>
                                <div class="card m-2">

                                    <img src="../upload/artigo/img/<?php printf($artigo['img-previw']); ?>" class="card-img" alt="capa_artigo">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <h1 class="h5 card-titulo "><?php printf($artigo['Titulo']) ?></h5>
                                                    <h2 class="h6 card-subtitulo-2 "><?php printf($artigo['Autor']) ?></h2>
                                            </div>

                                            <div class="col d-flex align-items-center">
                                                <div class="dropdown">
                                                    <a class="" id="toggle-opcoes" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </a>

                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Fazer download</a></li>
                                                        
                                                        <li><a class="dropdown-item" href="infoArtigo.php?id_artigo=<?= $artigo['ID'] ?>">informações</a></li>
                                                        <li><a class="dropdown-item" href="excluir-artigo.php?id_artigo=<?= $artigo['ID'] ?>">Excluir</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>


            <!--sidebar Menu -->

            <nav class="mx-3 barra-menu">
                <div class="row" id="head_sidebar">

                    <div class="col-4 d-flex align-items-center justify-content-center ">

                        <i class="bi bi-list" id="botao-esconder-menu"></i>

                    </div>


                    <div class="col">

                        <div id="h2_menu" class="col">
                            <h1 class="texto">Menu</h1>
                        </div>

                    </div>

                </div>

                <div id="menu">
                    <ul id="links_menu" class="menu-list nav flex-column">
                        <li><a class="h5 texto nav-link link-dark" href="home.php">Minha Biblioteca</a></li>
                        <!--<li><a class="h5 texto nav-link link-dark" href="#">Explorar</a></li>-->
                    </ul>
                </div>
            </nav>

        </div>

    </div>

    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebar.js"></script> <!--Navegação Menu -->
    <script src="js/index.js"></script>
</body>


</html>