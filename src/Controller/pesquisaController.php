<?php

namespace artorganizer\Controller;

use artorganizer\Repository\ArtigoRepository;

readonly class pesquisaController implements Controller
{
    private ArtigoRepository $artigoRepository;

    function __construct(array $repository)
    {
        $this->artigoRepository = $repository['artigo'];
    }

    function processarRequisicao(): void
    {
        validar();
        $pesquisa = $_POST['pesquisa'];
        $ArtigoList = $this->artigoRepository->pesquisa($pesquisa);

        require_once __DIR__ . "/../../views/pesquisa.php";
    }
}
