<?php

namespace artorganizer\Controller;

class landingpageController implements Controller
{
    function processarRequisicao(): void
    {
        require_once __DIR__ . "/../../views/landingPage.php";
    }
}
