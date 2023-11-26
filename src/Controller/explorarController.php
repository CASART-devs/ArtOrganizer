<?php

namespace artorganizer\Controller;

use artorganizer\Repository\ArtigoRepository;

readonly class explorarController implements Controller
{
    private ArtigoRepository $artigoRepository;
    function __construct(array $repository)
    {
        $this->artigoRepository = $repository['artigo'];
    }

    function processarRequisicao(): void
    {
        $id_user = $_SESSION['user_id'];

        $id_pasta = $_SESSION['id_pasta'] ?? 'root';

        $ArtigoList = $this->artigoRepository->explorar();

        require_once __DIR__ . "/../../views/explorar.php";
    }
}
