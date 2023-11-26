<?php

namespace artorganizer\Controller;

use Override;

class excluirSessaoController implements Controller
{


    /**
     * @inheritDoc
     */
    #[Override] public function processarRequisicao(): void
    {
        validar();
        unset($_SESSION['id_excluirPasta']);
        unset($_SESSION['id_excluirArtigo']);

        header("Location:/home");
    }
}