<!--NavBar-->
<nav class="navbar navbar-expand-lg color-nav">
        <div class="container-fluid">
            <div class="col-md-2">
                <a class="navbar-brand " href="#">
                    <img src="app/img/LOGOS/logo.png" alt="Logo" width="200rem" height="70rem" class="mx-3 d-inline-block align-text-top">

                </a>
            </div>
            
            <div class="ml-2 col-md-2  menu-icons">
                <!--<img class="m-1" src="img/navbar_home/notificação.svg" alt="Notificação" height="30rem">-->

                <div class="dropstart">
                    <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="m-1 mx-4 img-perfil" src="<?php if (isset($_SESSION['img-perfil'])) { ?>/upload/img-perfil/<?php echo $_SESSION['img-perfil'];
                                                                                                                                } else {
                                                                                                                                    echo "app/img/navbar_home/perfil.svg";
                                                                                                                                } ?>" alt="perfil" height="50rem">
                    </a>

                    <ul class="dropdown-menu">
                        <li><span class="m-2"><?php echo "@" . $_SESSION['Nick']; ?></span></li>
                        <li><a class="dropdown-item" href="/logout">Sair</a></li>

                    </ul>
                </div>

                <a href="configuracao"><img class="m-1" src="app/img/navbar_home/config.svg" alt="Configurações" height="30rem"></a>
            </div>
        </div>
    </nav>