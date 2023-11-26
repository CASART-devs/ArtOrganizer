<?php

namespace artorganizer\Controller;


use artorganizer\Entity\Arquivo;
use artorganizer\Entity\Artigo;
use artorganizer\Repository\ArtigoRepository;
use Exception;
use Override;

readonly class attArtigoController implements Controller
{
    private ArtigoRepository $artigoRepository;
    function __construct(array $repository)
    {
        $this->artigoRepository = $repository['artigo'];
    }

    #[Override] public function processarRequisicao(): void
    {
        $id = $_SESSION['id_artigo'];

        $titulo = $_POST['nomeArtigo'];
        $autor = $_POST['autor'];

        $artigo = $_FILES['artigo'];
        $img = $_FILES['imgArtigo'];

        try {

            if (!(isset($img)) && !(isset($artigo))) {
                die();
            }

            $arqImg = new arquivo(__DIR__ . "/../../public/upload/artigo/img/", $img);
            $arqArtigo = new Arquivo(__DIR__ . "/../../public/upload/artigo/artigo/", $artigo);
            $arqImg->moverImg($img);
            $arqArtigo->moverArtigo($artigo);

            if (($titulo == "") || ($autor == "")) {

                die();
            } else {
                $artigo = new Artigo($titulo, $autor, $arqImg->gerarNome(), $arqArtigo->gerarNome());
                $artigo->setId($id);
                $this->artigoRepository->update($artigo);
            }

            header("Location:/informacaoArtigo");
        } catch (Exception $error) {

            echo "Erro ao atualizar!  ($error) <br>";
            echo "Clique <a href='/configuracao'>aqui</a> para voltar";
        }
    }
}