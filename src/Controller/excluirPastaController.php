<?php

namespace artorganizer\Controller;

use artorganizer\Repository\PastaRepository;
use Exception;
use Override;

readonly class excluirPastaController implements Controller
{

    function __construct(private PastaRepository $pastaRepository)
    {
    }

    /**
     * @inheritDoc
     */
    #[Override] public function processarRequisicao(): void
    {
        try {
            unset($_SESSION['id_excluirPasta']);
            if (!isset($_GET['id_pasta'])) {
                die();
            } else {
                $id_pasta = $_GET['id_pasta'];
            }

            $this->pastaRepository->excluir($id_pasta);

            header("Location:/home");
        } catch (Exception $error) {

            echo "Erro ao excluir <br>" . $error;
        }
    }
}