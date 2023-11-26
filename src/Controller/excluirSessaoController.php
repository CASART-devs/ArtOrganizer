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
        unset($_SESSION['error']);
        unset($_SESSION['id_excluirPasta']);
        unset($_SESSION['id_excluirArtigo']);

        header("Location:/home");
    }
}