<?php

namespace artorganizer\Controller;

use artorganizer\Entity\Arquivo;
use artorganizer\Entity\Artigo;
use artorganizer\Repository\ArtigoRepository;
use artorganizer\Repository\PastaUserRepository;
use Exception;

readonly class addArtigoController implements Controller
{
    private ArtigoRepository $artigoRepository;
    private PastaUserRepository $pastaUserRepository;

    function __construct(array $repository)
    {
        $this->pastaUserRepository = $repository['pastaUser'];
        $this->artigoRepository = $repository['artigo'];
    }

    function processarRequisicao(): void
    {
        validar();
        //definição de variaveis
        $titulo = $_POST['titulo-artigo'];
        $autor = $_POST['autor-artigo'];

        $img = $_FILES['img-previw'];
        $artigo = $_FILES['artigo'];

        $id_user = $_SESSION['user_id'];


        $id_pasta = $_SESSION['id_pasta'] ?? $this->pastaUserRepository->getIdRoot($id_user);

        try {

            //tratamento de arquivos
            if (!(isset($img)) && !(isset($artigo))) {
                die();
            }

            if(isset($_POST['radio-privacidade'])){
                $privacidade = $_POST['radio-privacidade'];
            }

            $arqImg = new Arquivo(__DIR__ . "/../../public/upload/artigo/img/", $img);
            $arqArtigo = new Arquivo(__DIR__ . "/../../public/upload/artigo/artigo/", $artigo);
            $arqImg->moverImg($img);
            $arqArtigo->moverArtigo($artigo);



            //adiciona pasta no banco
            $artigo = new Artigo($titulo, $autor, $arqImg->gerarNome(), $arqArtigo->gerarNome(),$privacidade);
            $this->artigoRepository->add($id_pasta, $artigo);

            header("Location:/home");

        } catch (Exception $error) {
            echo "Não foi possivel adicionar artigo $error";
        }

    }
}