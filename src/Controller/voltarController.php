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
        unset($_SESSION['id_pasta']);
        header("location:/home");
    }
}