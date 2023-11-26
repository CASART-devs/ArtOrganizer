<?php

namespace artorganizer\Controller;

use Override;

class pegarSessaoController implements Controller
{

    /**
     * @inheritDoc
     */
    #[Override] public function processarRequisicao(): void
    {
        validar();
        $_SESSION['id_pasta'] = intval($_POST['id_pasta']);

        header("Location:/home");

    }
}