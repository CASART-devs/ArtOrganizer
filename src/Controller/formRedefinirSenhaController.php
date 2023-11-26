<?php

namespace artorganizer\Controller;

use artorganizer\Controller\Controller;

class formRedefinirSenhaController implements Controller
{

    /**
     * @inheritDoc
     */
    #[\Override] public function processarRequisicao(): void
    {
        require_once __DIR__ . "/../../views/redefinirSenha.html";
    }
}