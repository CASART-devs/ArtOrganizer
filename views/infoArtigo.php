<?php
/** @var Artigo $dados */

use artorganizer\Entity\Artigo;
use artorganizer\Repository\ArtigoRepository;

require_once "navbar.php";
?>
<body>


<div class="container-fluid pt-3">
    <div class="row">
        <div class="col d-flex justify-content-center align-itens-center m-5" id="content">
            <form enctype="multipart/form-data" action="/atualizarArtigo" method="post">
                <div class="container " id="informacoesArtigo">
                    <div class="row">
                        <h1>Informações do Artigo</h1>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nomeArtigo" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nomeArtigo" id="nomeArtigo"
                                       aria-describedby="helpId" placeholder="<?=
                                $dados[0]->getTitulo(); ?>"
                                       required>
                                <small id="helpId" class="form-text text-muted">Renomeie o Artigo</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="artigo" class="form-label">Artigo</label>
                                <input type="file" class="form-control" name="artigo" id="artigo"
                                       placeholder="artigo" aria-describedby="fileHelpId" required>
                                <div id="fileHelpId" class="form-text">Selecione outro artigo</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" class="form-control" name="autor" id="autor"
                                       aria-describedby="helpId" placeholder="<?= $dados[0]->getAutor(); ?>"
                                       required>
                                <small id="helpId" class="form-text text-muted">Renomeie o autor</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="imgArtigo" class="form-label">Capa do artigo</label>
                                <img src="/upload/artigo/img/<?= $dados[0]->getImg(); ?>" class="img-fluid m-2"
                                     alt="">
                                <input type="file" class="form-control" name="imgArtigo" id="imgArtigo"
                                       placeholder="imgArtigo" aria-describedby="fileHelpId" required>
                                <div id="fileHelpId" class="form-text">Selecione outro capa</div>
                            </div>
                            <div class="mb-3">
                                <?php

                                /** @var ArtigoRepository $artigoList */
                                if($dados[0]->getPrivacidade() == "priv"){
                                    $priv = "checked";
                                    $pub = "";
                                }else{
                                    $priv = "";
                                    $pub ="checked";
                                }?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio-privacidade"  value="pub" id="radio-publico" <?=$pub?>>
                                    <label class="form-check-label" for="radio-publico">
                                        Público
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio-privacidade" value="priv" id="radio-privado" <?=$priv?>>
                                    <label class="form-check-label" for="radio-privado">
                                        privado
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end align-itens-center">
                            <a id="btn_voltar" class="btn button m-2" href="/home" role="button">voltar</a>
                            <button type="submit" class="btn button m-2">Atualizar</button>
                            <a id="btn_download" class="btn button m-2"
                               href="/../../upload/artigo/artigo/<?= $dados[0]->getArtigo(); ?>"
                               target="_blank">Download</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>


        <!--sidebar Menu -->

        <?php require_once "sidebar.html" ?>

    </div>

</div>
</body>
