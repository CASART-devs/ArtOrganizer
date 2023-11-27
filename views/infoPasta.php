<?php
    /** @var Pasta $dados */

    use artorganizer\Entity\Pasta;

    require_once "navbar.php";?>
<body>


<div class="container-fluid pt-3">
    <div class="row">
        <div class="col d-flex justify-content-center align-itens-center m-5" id="content">
            <form action="/atualizarPasta" method="post">
                <div class="container " id="informacoesArtigo">
                    <div class="row">
                        <h1>Informações da pasta</h1>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nomePasta" class="form-label">Nome</label>
                                <input type="text"
                                       class="form-control" name="nomePasta" id="nomePasta"
                                       aria-describedby="helpId"
                                       placeholder="<?=
                                       $dados[0]->getNome(); ?>" required>
                                <small id="helpId" class="form-text text-muted">Renomeie a pasta</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label for="desc" class="form-label">Descrição</label>
                                <input type="text"
                                       class="form-control" name="desc" id="desc" aria-describedby="helpId"
                                       placeholder="<?= $dados[0]->getDescricao(); ?>" required>
                                <small id="helpId" class="form-text text-muted">Mude a descrição</small>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end align-itens-center">
                            <a id="btn_voltar" class="btn button m-2" href="/home"
                               role="button">voltar</a>
                            <button type="submit" class="btn button m-2">Atualizar</button>

                        </div>
                    </div>
                </div>
            </form>

        </div>


        <!--sidebar Menu -->

        <?php require_once "sidebar.html";?>


    </div>

</div>

</body>
