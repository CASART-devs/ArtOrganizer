<?php

require_once __DIR__ . "/../vendor/autoload.php";


//pesquisa de pastas

use artorganizer\src\Entity\Artigo;
use artorganizer\src\Repository\ArtigoRepository;

$pastas_query = $conexao->prepare("SELECT pastas.* FROM pastas INNER JOIN pasta_user ON pastas.id = pasta_user.id_pasta WHERE pasta_user.id_user = ?;");
$pastas_query->bind_param("s", $_SESSION['ID']);
$pastas_query->execute();
$resultPasta = $pastas_query->get_result();
$rowsPasta = $resultPasta->fetch_all(MYSQLI_ASSOC);

//pesquisa de artigos
$artigoRepository = new ArtigoRepository($conexao);

$id_user = $_SESSION['ID'];

if (isset($_SESSION['id_pasta'])) {
    $id_pasta = $_SESSION['id_pasta'];
    
} else {
    $id_pasta = 'root';
    
}
$ArtigoList= $artigoRepository->all($id_user, $id_pasta);



?>


    <!-- Modal -->
    <div class="modal fade" id="adicionar-artigo" tabindex="-1" aria-labelledby="adicionarArtigolLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo artigo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" action="/adicionarArtigo" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="" class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo-artigo" id="titulo-artigo" aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">insira o nome do artigo</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Autor</label>
                            <input type="text" class="form-control" name="autor-artigo" id="autor-artigo" aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">insira o nome do autor do artigo</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Capa do artigo</label>
                            <input type="file" class="form-control" name="img-previw" id="img-previw" placeholder="" aria-describedby="fileHelpId" required>
                            <div id="fileHelpId" class="form-text">Insira uma capa para o artigo</div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Artigo</label>
                            <input type="file" class="form-control" name="artigo" id="artigo" placeholder="" aria-describedby="fileHelpId" required>
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
                <form action="/adicionarPasta" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="nome-artigo" class="form-label">Nome da pasta</label>
                            <input type="text" class="form-control" name="nome-pasta" id="nome-artigo" aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Insira o nome da pasta</small>
                        </div>

                        <div class="mb-3">
                            <label for="desc-pasta" class="form-label">Descrição da pasta</label>
                            <textarea class="form-control" name="desc-pasta" id="desc-pasta" rows="3" required></textarea>
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

                            <span class="h1 m-2">Biblioteca <?= "do(a) " . $_SESSION['Nick'];?></span>

                            <?php if (isset($_SESSION['id_pasta'])) { ?>
                                <a type="button" id="btnVoltar" class="btn button col-2 mx-3" href="/voltar"> voltar </a>
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

                        <div class="dropdown">
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

                            <?php if (!(isset($_SESSION['id_pasta']))) { ?>
                                <?php foreach ($rowsPasta as $pasta) {
                                    if ($pasta['nome_pasta'] != 'root') { ?>
                                        
                                        <form method="post" action="/pegarSessao" class="m-2 ">

                                            <button type="submit" name="id_pasta" value="<?= $pasta['id']; ?>" class="btn button  btnPasta d-flex justify-content-between align-items-center">
                                                <span><?= $pasta['nome_pasta']; ?></span>

                                                <div class="dropdown">
                                                    <a class="" id="toggle-opcoes" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </a>

                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"   href="/informacaoPasta?id_pasta=<?= $pasta['id'] ?>">Informaçãoes</a></li>
                                                        <li><a class="dropdown-item" href="/excluirPasta?id_pasta=<?= $pasta['id'];?>">Excluir</a></li>

                                                    </ul>
                                                </div>
                                            </button>

                                        </form>
                            <?php }}} ?>


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

                            <?php foreach ($ArtigoList as $artigo) { ?>
                                <div class="card m-2">

                                    <img src="/upload/artigo/img/<?=($artigo->getImg()); ?>" class="card-img" alt="capa_artigo">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <h1 class="h5 card-titulo "><?=($artigo->getTitulo()) ?></h5>
                                                    <h2 class="h6 card-subtitulo-2 "><?=($artigo->getAutor()) ?></h2>
                                            </div>

                                            <div class="col d-flex align-items-center">
                                                <div class="dropdown">
                                                    <a class="" id="toggle-opcoes" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </a>

                                                    <ul class="dropdown-menu">                                                        
                                                        <li><a class="dropdown-item" href="/informacaoArtigo?id_artigo=<?= $artigo->getId() ?>">informações</a></li>
                                                        <li><a class="dropdown-item" href="/excluirArtigo?id_artigo=<?= $artigo->getId() ?>">Excluir</a></li>
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


            <?php require_once __DIR__ . "/../app/sidebar.php";?>

        </div>

    </div>

    
</body>

