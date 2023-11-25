<?php

namespace artorganizer\Controller;

use artorganizer\Entity\Pasta;
use artorganizer\Repository\PastaRepository;
use Exception;
use Override;

readonly class attPastaController implements Controller
{
    function __construct(private PastaRepository $pastaRepository)
    {
    }

    /**
     * @inheritDoc
     */
    #[Override] public function processarRequisicao(): void
    {

        $id = $_SESSION['id_infopasta'];

        $nome = $_POST['nomePasta'];
        $desc = $_POST['desc'];


        try {

            if (($nome == "") || ($desc == "")) {

                die();
            } else {


                $pasta = new Pasta($nome, $desc);
                $pasta->setId($id);
                $this->pastaRepository->update($pasta);
            }

            header("Location:/informacaoPasta");
        } catch (Exception $error) {

            echo "Erro ao atualizar!  ($error) <br>";
            echo "Clique <a href='/configuracao'>aqui</a> para voltar";
        }
    }
}