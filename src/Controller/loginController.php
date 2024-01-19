<?php

namespace artorganizer\Controller;

use artorganizer\Repository\UsuarioRepository;
use Exception;

readonly class loginController implements Controller
{

    private UsuarioRepository $usuarioRepository;

    function __construct(array $repository)
    {
        $this->usuarioRepository = $repository['usuario'];
    }

    function processarRequisicao(): void
    {

        $email = $_POST['email_log'];
        $senha = $_POST['senha_log'];

        try {


            $usuario = $this->usuarioRepository->logar($email, $senha);
            if ($usuario) {
                $_SESSION['user_id'] = $usuario->getId();
                $_SESSION['user_nick'] = $usuario->getNick();
                $_SESSION['user_nome'] = $usuario->getNome();
                $_SESSION['user_email'] = $usuario->getEmail();
                if($usuario->getPerfilImg() !== null) {
                    $_SESSION['user_img'] = $usuario->getPerfilImg();
                }

                header("Location: /home");
            } else {
                header("Location: /");
            }
        } catch (Exception $error) {
            echo "erro na query $error";
        }
    }
}
