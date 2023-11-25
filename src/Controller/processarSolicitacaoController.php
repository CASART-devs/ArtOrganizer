<?php

namespace artorganizer\Controller;

use artorganizer\Entity\Token;
use artorganizer\Repository\TokenRepository;
use Exception;
use Override;
use PHPMailer\PHPMailer\PHPMailer;

readonly class processarSolicitacaoController implements Controller
{
    public function __construct(private TokenRepository $tokenRepository)
    {
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    #[Override] public function processarRequisicao(): void
    {

        $id_user = $_SESSION['user_id'];
        $email = $_POST['email'];

        $token = new Token($id_user);

        $code = $this->tokenRepository->add($token);

        // Envio de e-mail
        $assunto = "REDEFINIR SENHA";
        $mensagem = "Para redefinir sua senha, clique no link a seguir http://localhost:8000/redefinir_senha?token=$code";

        $mail = new PHPMailer(true);

        try {

            // Configuração SMTP do Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Credenciais do Gmail
            $mail->Username = 'vinil115zv@gmail.com'; // Substitua pelo seu e-mail do Gmail
            $mail->Password = 'gezd unfh kzcb tzay'; // Substitua pela sua senha do Gmail

            // Remetente
            $mail->setFrom('vinil115zv@gmail.com', 'Artorganizer'); // Configure o remetente

            // Destinatário
            $mail->addAddress($email);
            $mail->addReplyTo('vinil115zv@gmail.com');

            // Conteúdo
            $mail->isHTML();
            $mail->Subject = $assunto;
            $mail->Body = $mensagem;

            // Envio
            $mail->send();
            header("location:/home");
        } catch (Exception $error) {
            echo "Erro ao enviar e-mail!<br>";
            echo "Erro: " . $error->getMessage();
            echo "<br>Clique <a href='/configuracao'>aqui</a> para voltar";
        }
    }
}