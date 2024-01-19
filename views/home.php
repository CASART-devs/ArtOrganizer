<?php

use artorganizer\Entity\Artigo;
use artorganizer\Entity\Pasta;

/** @var Pasta $pastaList */
/** @var Artigo $artigoList */
/**@var Artigo $dados */

require_once "navbar.php";
?>
<div aria-hidden="true" aria-labelledby="adicionarArtigolLabel" class="modal fade" id="adicionar-artigo"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo artigo</h1>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <form action="/adicionarArtigo" enctype="multipart/form-data" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label" for="titulo-artigo">Titulo</label>
                        <input aria-describedby="helpId" class="form-control" id="titulo-artigo" name="titulo-artigo"
                               placeholder="" required type="text">
                        <small class="form-text text-muted" id="helpId">insira o nome do artigo</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="autor-artigo">Autor</label>
                        <input aria-describedby="helpId" class="form-control" id="autor-artigo" name="autor-artigo"
                               placeholder="" required type="text">
                        <small class="form-text text-muted" id="helpId">insira o nome do autor do artigo</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Capa do artigo</label>
                        <input aria-describedby="fileHelpId" class="form-control" id="img-previw" name="img-previw"
                               placeholder=""
                               required type="file">
                        <div class="form-text" id="fileHelpId">Insira uma capa para o artigo</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Artigo</label>
                        <input aria-describedby="fileHelpId" class="form-control" id="artigo" name="artigo"
                               placeholder=""
                               required type="file">
                        <div class="form-text" id=" fileHelpId">Insira o artigo .pdf
                        </div>
                    </div>
                    <div class="mb-3">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-privacidade"  value="pub" id="radio-publico" checked>
                            <label class="form-check-label" for="radio-publico">
                                Público
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio-privacidade" value="priv" id="radio-privado">
                            <label class="form-check-label" for="radio-privado">
                                privado
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Fechar</button>
                    <button class="btn button" type="submit">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="adicionarPastaLabel" class="modal fade" id="adicionar-pasta"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nova pasta</h1>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <form action="/adicionarPasta" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label" for="nome-artigo">Nome da pasta</label>
                        <input aria-describedby="helpId" class="form-control" id="nome-artigo" name="nome-pasta"
                               placeholder="" required type="text">
                        <small class="form-text text-muted" id="helpId">Insira o nome da pasta</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="desc-pasta">Descrição da pasta</label>
                        <textarea class="form-control" id="desc-pasta" name="desc-pasta" required
                                  rows="3"></textarea>
                        <small class="helpId">Inisira uma descrição</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Fechar</button>
                    <button class="btn button" type="submit">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['id_excluirArtigo'])) { ?>
    <div class="modal" id="exluir-pasta" style="display:block" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza que deseja excluir o artigo?</p>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="/excluirSessao" type="button">Não</a>
                    <a class="btn button" href="/excluirArtigo?id_artigo=<?= $_SESSION['id_excluirArtigo'] ?>">Sim,
                        excluir</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isset($_SESSION['id_excluirPasta'])) { ?>
    <div class="modal" id="exluir-pasta" style="display:block" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza que deseja excluir o pasta?</p>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="/excluirSessao" type="button">Não</a>
                    <a class="btn button" href="/excluirPasta?id_pasta=<?= $_SESSION['id_excluirPasta'] ?>">Sim,
                        excluir</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<div class="container-fluid pt-3">
    <div class="row">


        <!-- conteudo principal-->


        <div class="col  mx-5" id="content">
            <div class="row my-4" id="head">
                <div class="col">
                    <div class="row">

                        <span class="h1 m-2">Biblioteca <?= "do(a) " . $_SESSION['user_nick']; ?></span>

                        <?php if (isset($_SESSION['id_pasta'])) { ?>
                            <a class="btn button col-2 mx-3" href="/voltar" id="btnVoltar" type="button">
                                voltar </a>
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
                        <button aria-expanded="false" class="btn button dropdown-toggle" data-bs-toggle="dropdown"
                                type="button">
                            Adicionar Artigos
                        </button>

                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" data-bs-target="#adicionar-artigo" data-bs-toggle="modal"
                                   href="#">Adicionar artigo</a></li>
                            <li><a class="dropdown-item" data-bs-target="#adicionar-pasta" data-bs-toggle="modal"
                                   href="#">Adicionar pasta</a></li>

                        </ul>
                    </div>
                </div>

            </div>

            <!-- Pastas -->
            <div class="row">
                <div class="col">
                    <?php if (!isset($_SESSION['id_pasta'])) { ?>
                        <div class="row">
                            <div class="grupo-conteudo my-2">

                                <a aria-controls="pastas" aria-expanded="false" data-bs-target="#pastas"
                                   data-bs-toggle="collapse">
                                    <div class="btn-alternar">
                                        <svg class="icone-alternar bi bi-arrow-down-short"
                                             fill="currentColor" height="2rem" viewBox="0 0 16 16"
                                             width="2rem" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"
                                                fill-rule="evenodd" />
                                        </svg>
                                        <span class="txt-esconder-pasta">Pastas</span>
                                    </div>
                                </a>


                            </div>
                        </div>
                    <?php } ?>
                    <div class="d-flex flex-row " id="pastas">

                        <?php if (!(isset($_SESSION['id_pasta']))) { ?>
                            <?php
                            foreach ($pastaList as $pasta) {
                                if ($pasta->getNome() != 'root') { ?>

                                    <form action="/pegarSessao" class="m-2 " method="post">

                                        <button
                                            class="btn button  btnPasta d-flex justify-content-between align-items-center"
                                            name="id_pasta" type="submit"
                                            value="<?= $pasta->getId(); ?>">
                                            <span><?= $pasta->getNome(); ?></span>

                                            <div class="dropdown">
                                                <a aria-expanded="false" class="" data-bs-toggle="dropdown" href="#"
                                                   id="toggle-opcoes" role="button">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                           href="/informacaoPasta?id_pasta=<?= $pasta->getId(); ?>">Informaçãoes</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                           href="/pegarIdExcluir?id_pasta=<?= $pasta->getId(); ?>">Excluir</a>
                                                    </li>

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

                            <a aria-controls="artigos" aria-expanded="false" data-bs-target="#artigos"
                               data-bs-toggle="collapse">
                                <div class="btn-alternar">
                                    <svg class="icone-alternar bi bi-arrow-down-short"
                                         fill="currentColor" height="2rem" viewBox="0 0 16 16"
                                         width="2rem" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"
                                            fill-rule="evenodd" />
                                    </svg>
                                    <span class="txt-esconder-pasta">Artigos</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row" id="artigos">

                        <?php foreach ($artigoList as $artigo) { ?>
                            <div class="card m-2">

                                <img alt="capa_artigo" class="card-img"
                                     src="/upload/artigo/img/<?= ($artigo->getImg()); ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10">
                                            <h1 class="h5 card-titulo "><?= ($artigo->getTitulo()) ?></h1>
                                            <h2 class="h6 card-subtitulo-2 "><?= ($artigo->getAutor()) ?></h2>
                                        </div>

                                        <div class="col d-flex align-items-center">
                                            <div class="dropdown">
                                                <a aria-expanded="false" class="" data-bs-toggle="dropdown" href="#"
                                                   id="toggle-opcoes" role="button">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                           href="/informacaoArtigo?id_artigo=<?= $artigo->getId() ?>">informações</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                           href="/pegarIdExcluir?id_artigo=<?= $artigo->getId(); ?>">Excluir</a>
                                                    </li>
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


        <?php require_once "sidebar.html"; ?>

    </div>

</div>

