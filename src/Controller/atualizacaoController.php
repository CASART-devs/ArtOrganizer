<?php

namespace artorganizer\Controller;

use artorganizer\Entity\Arquivo;
use artorganizer\Entity\Usuario;
use artorganizer\Repository\UsuarioRepository;
use Exception;

readonly class atualizacaoController implements Controller
{

    private UsuarioRepository $usuarioRepository;

    function __construct(array $repository)
    {
        $this->usuarioRepository = $repository['usuario'];
    }

    function processarRequisicao(): void
    {
        validar();

        $nome = $_POST['nome'];
        $nick = $_POST['nick'];
        $email = $_POST['email'];
        $nasc = $_POST['nasc'];
        $telefone = $_POST['telefone'];
        $id = $_SESSION['user_id'];
        $img = $_FILES['img-perfil'];

        try {
            if (isset($_FILES['img-perfil'])) {

                $arquivo = new Arquivo(__DIR__ . "/../../public/upload/img-perfil/", $img);
                $arquivo->moverImg($img);

            } else {
                die();
            }

            if (($nome == "") || ($nick == "") || ($email == "") || ($nasc == "") || ($telefone == "")) {
                die();
            } else {
                $usuario = new Usuario($nick, $nome, $email, $nasc);
                $usuario->setFone($telefone);
                $usuario->setPerfilImg($arquivo->gerarNome());
                $usuario->setId($id);
                $this->usuarioRepository->update($usuario);
            }


            $_SESSION['user_name'] = $usuario->getNome();
            $_SESSION['user_nick'] = $usuario->getNick();
            $_SESSION['user_email'] = $usuario->getEmail();

            $_SESSION['user_fone'] = $usuario->getFone();
            $_SESSION['user_img'] = $usuario->getPerfilImg();

            header("Location:/configuracao");
        } catch (Exception $error) {

            echo "Erro ao atualizar!  ($error) <br>";
            echo "Clique <a href='/configuracao'>aqui</a> para voltar";
        }
    }
}
