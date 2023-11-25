<?php

namespace artorganizer\Controller;

use artorganizer\Repository\ArtigoRepository;
use artorganizer\Repository\PastaUserRepository;
use Exception;

readonly class excluirArtigoController implements Controller
{

    function __construct(private ArtigoRepository $artigoRepository, private PastaUserRepository $pastaUserRepository)
    {
    }

    public function processarRequisicao(): void
    {


        unset($_SESSION['id_excluirArtigo']);
        try {
            if (!isset($_GET['id_artigo']) || (!isset($_SESSION['user_id']))) {
                die();
            } else {
                $id_artigo = $_GET['id_artigo'];
                $id_user = $_SESSION['user_id'];
            }


            $id_pasta = $_SESSION['id_pasta'] ?? $this->pastaUserRepository->getIdRoot($id_user);


            $this->artigoRepository->excluir($id_artigo);

            header("Location:/home");

        } catch (Exception $error) {
            echo "Erro ao excluir <br>" . $error;
        }

    }
}