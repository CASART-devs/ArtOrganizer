<!--NavBar-->
<nav class="navbar navbar-expand-lg color-nav">
    <div class="container-fluid">
        <div class="col-md-2">
            <a class="navbar-brand " href="#">
                <img alt="Logo" class="mx-3 d-inline-block align-text-top" height="70rem" src="/img/logos/logo.png"
                     width="180rem">

            </a>
        </div>

        <div class="ml-2 col-md-2  menu-icons">
            <!--<img class="m-1" src="img/navbar_home/notificação.svg" alt="Notificação" height="30rem">-->

            <div class="dropstart">
                <a aria-expanded="false" class="" data-bs-toggle="dropdown" href="#" role="button">
                    <img class="m-1 mx-4 img-perfil" alt="perfil" height="50rem"
                         src="<?php if (isset($_SESSION['user_img'])) { ?>/upload/img-perfil/<?php echo $_SESSION['user_img'];
                                 } else {
                                     echo "/img/navbar_home/perfil.svg";
                    } ?>" >
                </a>

                <ul class="dropdown-menu">
                    <li><span class="m-2"><?php echo "@" . $_SESSION['user_nick']; ?></span></li>
                    <li><a class="dropdown-item" href="/logout">Sair</a></li>

                </ul>
            </div>

            <a href="/configuracao"><img alt="Configurações" class="m-1" height="30rem" src="img/navbar_home/config.svg"></a>
        </div>
    </div>
</nav>