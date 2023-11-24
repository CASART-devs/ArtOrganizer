<?php

namespace artorganizer\Controller;

use artorganizer\Controller\Controller;
use artorganizer\Repository\ArtigoRepository;

class explorarController implements Controller
{

    function __construct(private  ArtigoRepository $artigoRepository,)
    {
    }

    function processarRequisicao()
    {
        $id_user = $_SESSION['user_id'];

        if (isset($_SESSION['id_pasta'])) {
            $id_pasta = $_SESSION['id_pasta'];
        } else {
            $id_pasta = 'root';
        }

        $ArtigoList = $this->artigoRepository->explorar();

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

                                <span class="h1 m-2">Explorar artigos</span>

                                <?php if (isset($_SESSION['id_pasta'])) { ?>
                                    <a type="button" id="btnVoltar" class="btn button col-2 mx-3" href="/voltar"> voltar </a>
                                <?php } ?>

                                <div class="row">
                                </div>


                            </div>
                        </div>



                    </div>




                    <div class="row">
                        <div class="col">

                            <div class="row" id="artigos">

                                <?php foreach ($ArtigoList as $artigo) { ?>

                                    <div class="card m-2">
                                        <a href="/upload/artigo/artigo/<?= $artigo->getArtigo(); ?>" target="_blank">
                                            <img src="/upload/artigo/img/<?= ($artigo->getImg()); ?>" class="card-img" alt="capa_artigo">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <h1 class="h5 card-titulo "><?= ($artigo->getTitulo()) ?></h1>
                                                        <h2 class="h6 card-subtitulo-2 "><?= ($artigo->getAutor()) ?></h2>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>

                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>


                <?php require_once __DIR__ . "/../../app/sidebar.php"; ?>

            </div>

        </div>


        </body>
<?php
    }
}
