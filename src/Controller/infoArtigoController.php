<?php

namespace artorganizer\Controller;


use artorganizer\Repository\ArtigoRepository;
use Exception;

readonly class infoArtigoController implements Controller
{

    private ArtigoRepository $artigoRepository;

    function __construct(array $repository)
    {
        $this->artigoRepository = $repository['artigo'];
    }

    function processarRequisicao(): void
    {
        validar();
        try {
            if (isset($_GET['id_artigo'])) {
                $id = $_GET['id_artigo'];
                $_SESSION['id_artigo'] = $id;
            } else {
                $id = $_SESSION['id_artigo'];
                unset($_SESSION['id_artigo']);
            }

            $dados = $this->artigoRepository->carregarInformacoes($id);
        } catch (Exception $error) {
            echo "erro na query $error";
        }

        require_once __DIR__ . "/../../views/infoArtigo.php";
    }
}
