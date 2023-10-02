<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtOrganizer</title>

    <!-- bootstrap5 -->
    <link rel="stylesheet" href="../../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">


    <!--css-->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/sidebar.css">
</head>

<body>
    <div>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="col-md-2">
                    <a class="navbar-brand " href="#">
                        <img src="" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                        <span>ArtOrganizer</span>
                    </a>
                </div>
                <form class=" d-flex col-md-6">
                    <input class="form-control me-2 mx-3" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0 col-2" type="submit">Pesquisa</button>
                    <!-- aqui terá php, para enviar uma pesquisa para a tabela artigos e retornara os artigos na aba de pesquisa -->
                </form>
                <div class="ml-2 col-md-2  menu-icons">
                    <img class="m-1" src="../../img/navbar_home/notificação.svg" alt="Notificação" height="30rem">
                    <img class="m-1" src="../../img/navbar_home/perfil.svg" alt="perfil" height="50rem">
                    <a href="#"><img class="m-1" src="../../img/navbar_home/config.svg" alt="Configurações" height="30rem"></a>
                </div>
            </div>
        </nav>


        <!--Conteudo-->
        <div class="container-fluid pt-3">

            <div class="row">

                <div class="col">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <h1>Configurações</h1>
                                    <div class="row">
                                        <img src="#" alt="">
                                        <h2>Nome_user</h2>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="container">
                                        <div class="list-group list-group-flush">
                                            <a href="configuracao.php">Minha conta</a>
                                            <!-- <a href="notificaocoesConfig.php">Notificações</a> -->
                                            <!-- <a href="geralConfiguracao.php">Geral</a> -->
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col">



                                <div class="row">
                                    <h1>Minha conta</h1>
                                </div>
                                <form action="" method="post">
                                    <div class="row">

                                        <div class="col">
                                            <div class="row d-flex justify-content-start">

                                                <div class="col mb-3 mr-3">
                                                    <label for="" class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Digite seu nome</small>
                                                </div>

                                                <div class="col  mb-3 mr-3">
                                                    <label for="" class="form-label">Sobrenome</label>
                                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Digite seu sobrenome</small>
                                                </div>

                                            </div>

                                            <div class="row d-flex justify-content-start">

                                                <div class="col  mb-3 mr-3">
                                                    <label for="" class="form-label">Telefone</label>
                                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">(DDD) - (seu numero)</small>
                                                </div>

                                                <div class="col mb-3 mr-3">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
                                                    <small id="emailHelpId" class="form-text text-muted">Digite seu email</small>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-start">
                                                <div class="col mb-3 mr-3">
                                                    <label for="" class="form-label">Senha</label>
                                                    <input type="password" class="form-control" name="" id="" placeholder="">
                                                    <small id="passwordHelpId" class="form-text text-muted">Digite sua senha.</small>
                                                </div>

                                                <div class="col mb-3 mr-3">
                                                    <label for="" class="form-label">Data de nascimento</label>
                                                    <input type="date" class="form-control" name="" id="" style="width: 220px;">
                                                    <small id="birthdayHelpId" class="form-text text-muted">Digite sua data de nascimento.</small>
                                                </div>


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
                            <li><a class="h5 texto nav-link link-dark" href="../../home.php">Minha Biblioteca</a></li>
                            <!--<li><a class="h5 texto nav-link link-dark" href="#">Explorar</a></li>-->
                        </ul>
                    </div>
                </nav>

            </div>

        </div>
        <!--/Conteudo-->


    </div>

    <script src="../../bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script src="../../js/sidebar.js"></script>

</body>

</html>