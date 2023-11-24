<?php

namespace artorganizer\Controller;

use artorganizer\Controller\Controller;
use artorganizer\Repository\UsuarioRepository;

class loginController implements Controller
{

    function __construct(private UsuarioRepository $usuarioRepository)
    {
    }




    function processarRequisicao()
    {


        $email = $_POST['email_log'];
        $senha = $_POST['senha_log'];

        try {


            $usuario = $this->usuarioRepository->logar($email, $senha);
            if ($usuario != false) {
                $_SESSION['user_id'] = $usuario->getId();
                $_SESSION['user_nick'] = $usuario->getNick();
                $_SESSION['user_nome'] = $usuario->getNome();
                $_SESSION['user_email'] = $usuario->getEmail();

                header("Location: /home");
            } else {
                header("Location: /");
            }
        } catch (\Exception $error) {
            echo "erro na query $error";
        }
    }
}
