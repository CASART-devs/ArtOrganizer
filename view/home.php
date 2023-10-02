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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="col-md-2">
                <a class="navbar-brand " href="#">
                    <img src="img/LOGOS/" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <span>ArtOrganizer</span>
                </a>
            </div>
            <form class=" d-flex col-md-6">
                <input class="form-control me-2 mx-3" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0 col-2" type="submit">Pesquisa</button>
                <!-- aqui terá php, para enviar uma pesquisa para a tabela artigos e retornara os artigos na aba de pesquisa -->
            </form>
            <div class="ml-2 col-md-2  menu-icons">
                <img class="m-1" src="img/navbar_home/notificação.svg" alt="Notificação" height="30rem">
                <img class="m-1" src="img/navbar_home/perfil.svg" alt="perfil" height="50rem">
                <a href="../view/pages/configuracao/configuracao.php"><img class="m-1" src="img/navbar_home/config.svg" alt="Configurações" height="30rem"></a>
            </div>
        </div>
    </nav>

    <!--offcanvas amigos-->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Amigos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="col m-2">
                <div class="row">

                    <div class="row">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Pesquisa" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <span>Online</span>

                    <div class="row">

                        <div class="amigo row my-2 mt-4">
                            <div class="col-4">
                                <img class="perfil-img" src="img/navbar_home/perfil.svg" alt="">
                            </div>
                            <div class="col">
                                <span class="h5">Nome_amigo</span>
                                <small>comentario_amigo</small>
                            </div>
                        </div>

                        <div class="amigo row my-2 mt-4">
                            <div class="col-4">
                                <img class="perfil-img" src="img/navbar_home/perfil.svg" alt="">
                            </div>
                            <div class="col">
                                <span class="h5">Nome_amigo</span>
                                <small>comentario_amigo</small>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <span>offline</span>

                    <div class="row">

                        <div class="amigo row my-2 mt-4">
                            <div class="col-4">
                                <img class="perfil-img" src="img/navbar_home/perfil.svg" alt="">
                            </div>
                            <div class="col">
                                <span class="h5">Nome_amigo</span>
                                <small>comentario_amigo</small>
                            </div>
                        </div>

                        <div class="amigo row my-2 mt-4">
                            <div class="col-4">
                                <img class="perfil-img" src="img/navbar_home/perfil.svg" alt="">
                            </div>
                            <div class="col">
                                <span class="h5">Nome_amigo</span>
                                <small>comentario_amigo</small>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!--Sidebar amigos -->

    <div class="container-fluid pt-3">
        <div class="row">

            <nav class="mx-3 barra-amigos" style="max-width: 15rem;">

                <div class="row" id="head_sidebar">
                    <div class="col texto" id="h2_amigos">
                        <div>
                            <a name="amigos" id="btn_amigos" data-bs-toggle="offcanvas" href="#offcanvasScrolling" role="button" aria-controls="offcanvasScrolling">
                                <span class="h2">Amigos</span>
                                <!-- número do círculo deve ser atualizado conforme a quantidade de amigos 
                                aqui terá código php-->
                                <i class="bi bi-7-circle-fill mx-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <svg class="mx-2" id="botao-esconder-amigos" xmlns="http://www.w3.org/2000/svg" width=2rem height="2rem" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z" />
                        </svg>
                    </div>
                </div>

                <div class="texto" id="amigos">
                    <!-- Início do conteúdo dos amigos 
                    aqui terá código php-->

                    <div class="amigo row my-2 mt-4">
                        <div class="col-4">
                            <img class="perfil-img" src="img/navbar_home/perfil.svg" alt="">
                        </div>
                        <div class="col">
                            <span class="h5">Nome_amigo</span>
                            <small>comentario_amigo</small>
                        </div>
                    </div>

                    <div class="amigo row my-2">
                        <div class="col-4">
                            <img class="perfil-img" src="img/navbar_home/perfil.svg" alt="">
                        </div>
                        <div class="col">
                            <span class="h5">Nome_amigo</span>
                            <small>comentario_amigo</small>
                        </div>
                    </div>

                    <div class="amigo row my-2">
                        <div class="col-4">
                            <img class="perfil-img" src="img/navbar_home/perfil.svg" alt="imagem de pre">
                        </div>
                        <div class="col">
                            <span class="h5">Nome_amigo</span>
                            <small>comentario_amigo</small>
                        </div>
                    </div>
                    <!-- Fim do conteúdo dos amigos -->
                </div>

            </nav>



            <!-- conteudo principal-->


            <div class="col" id="content">
                <div class="row my-4" id="head">
                    <div class="col">
                        <div class="row">
                            <span class="h1 m-2">Biblioteca</span>
                            <!-- aqui terá php, para identifica o pasta atual do usuario -->
                            <div class="row">
                            </div>

                            <div class="row">
                                <!-- aqui terá php, para pegar as tags, e amigos do banco de dados 
                                e fazer a pesquisa pelos seletores -->

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

                            </div>

                        </div>
                    </div>

                    <div class="col" id="head-right">

                        <div class="dropdown"> <!-- aqui tera php, para adicionar artigos e pastas -->
                            <button class="btn button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Adicionar Artigos
                            </button>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Adicionar artigo</a></li>
                                <li><a class="dropdown-item" href="#">Adicionar pasta</a></li>
                                <li><a class="dropdown-item" href="#">criar pasta</a></li>
                            </ul>


                        </div>


                    </div>
                </div>

                <!-- Pastas -->
                <div class="row">
                    <div class="col">
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
                        <div class="row" id="pastas">
                            <!-- aqui terá php, para mostrar as pastas q o 
                            usuario possui no banco, e acessa-las -->
                            <input class="button btn col m-2" type="button" value="Pasta 01">
                            <input class="button btn col m-2" type="button" value="Pasta 01">
                            <input class="button btn col m-2" type="button" value="Pasta 01">
                            <input class="button btn col m-2" type="button" value="Pasta 01">

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
                            <!-- aqui terá php, para mostrar os artígod q o 
                            usuario possui no banco, e acessa-las -->

                            <!--cartao-->
                            <div class="card m-2">
                                <img src="img/capa_artigos/img_livro_exmp.png" class="card-img" alt="capa_artigo">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10">
                                                <h1 class="h5 card-titulo ">Nome</h5>
                                                <h2 class="h6 card-subtitulo-2 ">Autor</h2>
                                        </div>
                                        
                                        <div class="col d-flex align-items-center">
                                            <div class="dropdown">
                                                <a class="" id="toggle-opcoes" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Fazer download</a></li>
                                                    <li><a class="dropdown-item" href="#">Renomear</a></li>
                                                    <li><a class="dropdown-item" href="#">Informações do arquivo</a></li>
                                                    <li><a class="dropdown-item" href="#">Excluir</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <!--cartao-->
                            <div class="card m-2">
                                <img src="img/capa_artigos/img_livro_exmp.png" class="card-img" alt="capa_artigo">
                                <div class="card-body">
                                <div class="row">
                                        <div class="col-10">
                                                <h1 class="h5 card-titulo ">Nome</h5>
                                                <h2 class="h6 card-subtitulo-2 ">Autor</h2>
                                        </div>
                                        
                                        <div class="col d-flex align-items-center">
                                            <div class="dropdown">
                                                <a class="" id="toggle-opcoes" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Fazer download</a></li>
                                                    <li><a class="dropdown-item" href="#">Renomear</a></li>
                                                    <li><a class="dropdown-item" href="#">Informações do arquivo</a></li>
                                                    <li><a class="dropdown-item" href="#">Excluir</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
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
</body>


</html>