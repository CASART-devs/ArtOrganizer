<?php

namespace artorganizer\Controller;

class logoutController implements Controller
{

    function __construct()
    {
    }

    function processarRequisicao(): void
    {
        session_destroy();
        header("Location:/");
    }
}
