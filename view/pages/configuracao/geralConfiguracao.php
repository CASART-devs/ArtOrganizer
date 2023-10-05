<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtOrganizer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/sidebar.css">

</head>

<body>
    <div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand col-md-2" href="#">
                    <img src="../../img/LOGOS/" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <span>ArtOrganizer</span>
                </a>
                <form class=" d-flex col-md-8">
                    <input class="form-control me-2 mx-3 col-8" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0 col-2" type="submit">Pesquisa</button>
                </form>
                <div class="ml-2 col-md-2">
                    <img class="m-1" src="../../img/navbar_home/notificação.svg" alt="Notificação" height="30rem">
                    <img class="m-1" src="../../img/navbar_home/perfil.svg" alt="perfil" height="50rem">
                    <img class="m-1" src="../../img/navbar_home/config.svg" alt="Configurações" height="30rem">
                </div>
            </div>
        </nav>

        <!--Conteudo-->
        <div class="container-fluid">

            <div class="row">

                <div class="col">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <h1>Configurações</h1>
                                </div>

                                <div class="row">
                                    <img src="#" alt="">
                                    <h2>Nome_user</h2>
                                </div>
                                <div class="row">
                                    <div class="list-group list-group-flush">
                                        <a href="configuracao.php">Minha conta</a>
                                        <a href="notificaocoesConfig.php">Notificações</a>
                                        <a href="geralConfiguracao.php">Geral</a>
                                    </div>
                                </div>

                            </div>

                            <div class="col">



                                <div class="row">
                                    <h1>Geral</h1>
                                </div>
                                <form action="" method="post">
                                    <div class="row">

                                        <div class="col">
                                            <div class="row">

                                                <div class="col mb-3 mr-3">
                                                    <label for="" class="h2 form-label">Idioma</label>
                                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                                   
                                                </div>

                                                

                                            </div>

                                            <div class="row">

                                                <div class="col mb-3 mr-3">
                                                    <label for="" class="h2 form-label">Privacidade</label>
                                                        <ul>
                                                            <li>Português</li>
                                                            <li>Inglês</li>
                                                        </ul>
                                                   <small>A artOrganizer proteje o seu historico então esta opção serve para que voce consiga ver isto.</small> 
                                                    
                                                </div>

                                                
                                            </div>

                                            <div class="row">
                                               
                                                <div class="form-check">
                                                    <h1 class="h2 form-label">Upload</h1>
                                                    <div class="ml-4">
                                                    <input class="form-check-input" type="checkbox" value="" id="">
                                                        <label class="form-check-label" for="">
                                                                Os arquivos ja serem em formatos de editores google
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                

                                                


                                            </div>
                                            <div class="row">
                                                <div class="d-grid gap-2 m-2">
                                                    <button type="submit" name="" id="" class="btn btn-primary">salvar</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="">
                                            <label for="" class="h2 form-label">Aba menu</label>
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="">
                                              <label class="form-check-label" for="">
                                                So estar la os arquivos dos ultimos horarios
                                              </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="">
                                                <label class="form-check-label" for="">
                                                    So estar la os favoritos.                                             
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Navegação Menu -->
                <nav class="mx-3" id="barra-menu" style="max-width: 15rem;">
                    <div class="row" id="head_sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                    </svg>

                        <h1 id="h2_menu">Menu</h1>

                    </div>


                    <div id="menu">
                        <ul id="links_menu" class="menu-list nav flex-column">
                            <li><a class="h5 nav-link" href="../../home.php">Minha Biblioteca</a></li>
                            <li><a class="h5 nav-link" href="#">Amigos</a></li>
                            <li><a class="h5 nav-link" href="#">Explorar</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>
        <!--/Conteudo-->


    </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../js/sidebar.js"></script>

</html>