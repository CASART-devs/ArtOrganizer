<?php

namespace artorganizer\Controller;

use artorganizer\Repository\PastaRepository;
use Exception;
use Override;

readonly class infoPastaController implements Controller
{
    private PastaRepository $pastaRepository;

    function __construct(array $repository)
    {
        $this->pastaRepository = $repository['pasta'];
    }

    /**
     * @inheritDoc
     */
    #[Override] public function processarRequisicao(): void
    {

        validar();
        try {
            if (isset($_GET['id_pasta'])) {
                $id = $_GET['id_pasta'];
                $_SESSION['id_infopasta'] = $id;
            } else {
                $id = $_SESSION['id_infopasta'];
                unset($_SESSION['id_infopasta']);
            }

            $dados = $this->pastaRepository->carregarInformacoes($id);


        } catch (Exception $error) {
            echo "erro na query $error";
        }

        require_once  __DIR__ . "/../../views/infoPasta.php";
    }
}