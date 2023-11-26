<?php

namespace artorganizer\Controller;

class formRedefinirSenhaController implements Controller
{

    /**
     * @inheritDoc
     */
    public function processarRequisicao(): void
    {
        require_once __DIR__ . "/../../views/redefinirSenha.html";
    }
}