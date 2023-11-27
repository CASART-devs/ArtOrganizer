<?php

namespace artorganizer\Controller;

use Override;

class voltarController implements Controller
{

    /**
     * @inheritDoc
     */
    #[Override] public function processarRequisicao(): void
    {
        validar();
        unset($_SESSION['id_pasta']);
        header("location:/home");
    }
}