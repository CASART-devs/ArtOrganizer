<?php

namespace artorganizer\Controller;

class configuracaoController implements Controller
{

    function __construct()
    {
    }

    function processarRequisicao(): void
    {
        validar();
        require_once __DIR__ . "/../../views/configuracao.php";
    }
}
