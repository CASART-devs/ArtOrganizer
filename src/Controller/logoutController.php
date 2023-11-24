<?php

namespace artorganizer\Controller;

use artorganizer\Controller\Controller;

class logoutController implements Controller
{


    function __construct()
    {
    }

    function processarRequisicao()
    {
        session_destroy();

        header("Location:/");
    }
}
