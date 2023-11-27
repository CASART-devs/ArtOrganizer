<?php

namespace artorganizer\Controller;

use artorganizer\Repository\ArtigoRepository;
use artorganizer\Repository\PastaRepository;

readonly class homeController implements Controller
{
    private pastaRepository $pastaRepository;
    private artigoRepository $artigoRepository;

    function __construct(array $respository)
    {
        $this->pastaRepository = $respository['pasta'];
        $this->artigoRepository = $respository['artigo'];
    }

    function processarRequisicao(): void
    {
        validar();

        $id_user = $_SESSION['user_id'];

        $id_pasta = $_SESSION['id_pasta'] ?? 'root';
        $pastaList = $this->pastaRepository->all($id_user);
        $artigoList = $this->artigoRepository->all($id_user, $id_pasta);

        require_once __DIR__ . "/../../views/home.php";
    }
}
