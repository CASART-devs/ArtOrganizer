<?php

namespace artorganizer\Controller;

use artorganizer\Controller\Controller;

class configuracaoController implements Controller
{

    function __construct()
    {
    }

    function processarRequisicao()
    {

?>

        <body>
            <div>
                <!--Conteudo-->
                <div class="container-fluid pt-3">

                    <div class="row">

                        <div class="col">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="row">
                                            <h1>Configurações</h1>

                                        </div>


                                        <div class="row">
                                            <div class="container">
                                                <div class="list-group list-group-flush">
                                                    <a href="/configuracao">Minha conta</a>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col">



                                        <div class="row">
                                            <h1>Minha conta</h1>
                                        </div>
                                        <form enctype="multipart/form-data" action="/atualizacao" method="post">
                                            <div class="row">

                                                <div class="col">
                                                    <div class="row d-flex justify-content-start">

                                                        <div class="col mb-3 mr-3">
                                                            <label for="" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="nome" id="" aria-describedby="helpId" placeholder="<?= $_SESSION['user_nome']; ?>" required>
                                                            <small id="helpId" class="form-text text-muted">Digite seu
                                                                nome</small>
                                                        </div>

                                                        <div class="col  mb-3 mr-3">
                                                            <label for="" class="form-label">Nickname</label>
                                                            <input type="text" class="form-control" name="nick" id="" aria-describedby="helpId" placeholder="<?= $_SESSION['user_nick']; ?>" required>
                                                            <small id="helpId" class="form-text text-muted">Digite seu
                                                                nickname</small>
                                                        </div>

                                                    </div>

                                                    <div class="row d-flex justify-content-start">


                                                        <div class="col mb-3 mr-3">
                                                            <label for="" class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="<?= $_SESSION['user_email']; ?>" required>
                                                            <small id="emailHelpId" class="form-text text-muted">Digite seu
                                                                email</small>
                                                        </div>

                                                    </div>

                                                    <div class="row d-flex justify-content-start">

                                                        <div class="row">
                                                            <div class="col mb-3 mr-3">
                                                                <label for="" class="form-label">Data de nascimento</label>
                                                                <input type="date" class="form-control" name="nasc" id="" style="width: 220px;" required>
                                                                <small id="birthdayHelpId" class="form-text text-muted">Digite
                                                                    sua data de nascimento.</small>
                                                            </div>
                                                            <div class="col  mb-3 mr-3">
                                                                <label for="" class="form-label">Telefone</label>
                                                                <input type="text" class="form-control" name="telefone" id="" aria-describedby="helpId" placeholder="<?php

                                                                                                                                                                        if (isset($_SESSION['user_fone'])) {
                                                                                                                                                                            echo $_SESSION['user_fone'];
                                                                                                                                                                        } ?>" required>

                                                                <small id="helpId" class="form-text text-muted">(DDD) - (seu
                                                                    numero)</small>
                                                            </div>
                                                        </div>

                                                        <div class="col mb-3 ">
                                                            <label for="" class="form-label">Imagem de perfil</label>
                                                            <div class="row m-2 perfil">
                                                                <img src="<?php
                                                                            if (isset($_SESSION['user_img'])) {
                                                                            ?>/upload/img-perfil/<?php echo $_SESSION['user_img'];
                                                                                            } else {
                                                                                                echo "/img/navbar_home/perfil.svg";
                                                                                            } ?>" class="img-fluid" alt="" required>
                                                            </div>

                                                            <input type="file" class="form-control" name="img-perfil" id="" placeholder="" aria-describedby="fileHelpId">

                                                        </div>


                                                    </div>
                                                    <div class="row mb-3 mr-3">
                                                        <a href="/recuperar">
                                                            esqueceu a senha?
                                                        </a>
                                                    </div>
                                                    <div class="row d-flex justify-content-start">

                                                        <div class="col d-grid gap-2 m-2">
                                                            <button type="submit" name="" id="" class="button btn">Atualizar</button>
                                                        </div>
                                                        <div class=" col d-grid gap-2 m-2">
                                                            <button type="button" name="" id="" class="button btn ">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Navegação Menu -->
                        <?php require_once __DIR__ . "/../../app/sidebar.php"; ?>

                    </div>

                </div>



            </div>

        </body>

<?php
    }
}
