<?php

namespace artorganizer\Controller;

use artorganizer\Entity\Pasta;
use artorganizer\Entity\Usuario;
use artorganizer\Repository\PastaRepository;
use artorganizer\Repository\UsuarioRepository;
use Exception;


readonly class cadastroController implements Controller
{

    function __construct(private UsuarioRepository $usuarioRepository, private PastaRepository $pastaRepository)
    {
    }

    function processarRequisicao(): void
    {
        try {

            $nome = $_POST['nome_cad'];
            $email = $_POST['email_cad'];
            $senha = $_POST['senha_cad'];
            $nasc = $_POST['nasc_cad'];
            $nick = $_POST['user_cad'];
            //cadastra usuario

            $Usuario = new Usuario($nick, $nome, $email, $nasc);
            $Usuario->setSenha(password_hash($senha, PASSWORD_DEFAULT));
            $this->usuarioRepository->add($Usuario);

            //cria pasta root

            $pasta = new Pasta("root", "Pasta princípal");
            $this->pastaRepository->add($Usuario->getId(), $pasta);

            header("location:/");
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
