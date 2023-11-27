<?php

namespace artorganizer\Controller;

use artorganizer\Repository\ArtigoRepository;
use artorganizer\Repository\PastaUserRepository;
use Exception;

readonly class excluirArtigoController implements Controller
{
    private ArtigoRepository $artigoRepository;
    function __construct(array $repository)
    {
        $this->artigoRepository = $repository['artigo'];
    }

    public function processarRequisicao(): void
    {
        validar();

        unset($_SESSION['id_excluirArtigo']);
        try {
            if (!isset($_GET['id_artigo']) || (!isset($_SESSION['user_id']))) {
                die();
            } else {
                $id_artigo = $_GET['id_artigo'];

            }

            $this->artigoRepository->excluir($id_artigo);

            header("Location:/home");

        } catch (Exception $error) {
            echo "Erro ao excluir <br>" . $error;
        }

    }
}