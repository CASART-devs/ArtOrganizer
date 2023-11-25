<?php

namespace artorganizer\Controller;

class sidebarController
{

    public function __construct()
    {
        ?>
        <!--sidebar Menu -->

        <nav class="mx-3 barra-menu">

            <div class="row d-flex justify-content-center align-items-center" id="head_sidebar">

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
                    <li><a class="h5 texto nav-link link-dark" href="/home">Minha Biblioteca</a></li>
                    <li><a class="h5 texto nav-link link-dark" href="/explorar">Explorar</a></li>
                </ul>
            </div>

        </nav>
        <?php
    }
}