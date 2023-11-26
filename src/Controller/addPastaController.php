<?php

namespace artorganizer\Controller;

use artorganizer\Entity\Pasta;
use artorganizer\Repository\PastaRepository;
use Exception;
use Override;

readonly class addPastaController implements Controller
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
        $nome = $_POST['nome-pasta'];
        $desc = $_POST['desc-pasta'];
        $id_user = $_SESSION['user_id'];

        try {
            //adiciona pasta no banco

            $pasta = new Pasta($nome, $desc);
            $this->pastaRepository->add($id_user, $pasta);

            header("Location:/home");
        } catch (Exception $error) {
            echo "Não foi possivel criar pasta $error";
        }
    }
}