<?php

namespace artorganizer\Controller;

use Override;

class recuperarController implements Controller
{

    /**
     * @inheritDoc
     */
    #[Override] public function processarRequisicao(): void
    {
        validar();
        require_once __DIR__ . "/../../views/formRecuperarSenha.html";
    }
}