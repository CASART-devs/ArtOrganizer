<?php

namespace artorganizer\Controller;

use mysqli;
use Override;

readonly class redefinirSenhaController implements Controller
{

    private mysqli $bd;

    public function __construct(mysqli $bd)
    {
        $this->bd = $bd;
    }

    function verificarTokenValido($token): bool
    {

        $sql = "SELECT * FROM rec_senha WHERE token = ? AND data_expiracao > NOW()";
        $stmt = $this->bd->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return true;
        } else {
            return false;
        }

    }

    function armazenarSenhaComSeguranca($usuarioId, $novaSenha): bool
    {

        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);


        $sql = "UPDATE usuarios SET senha = ? WHERE ID = ?";
        $stmt = $this->bd->prepare($sql);
        $stmt->bind_param('si', $senhaHash, $usuarioId);

        return $stmt->execute();

    }

    /**
     * @inheritDoc
     */
    #[Override] public function processarRequisicao(): void
    {

        $token = $_GET['token'];

        $sql = "SELECT * FROM rec_senha WHERE token = ? AND data_expiracao > NOW()";
        $stmt = $this->bd->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result->num_rows == 1) {
            echo "Token inválido ou expirado.";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $novaSenha = $_POST['nova_senha'];

            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

            $usuarioId = $_SESSION['user_id'];

            $sql = "UPDATE usuarios SET senha = ? WHERE ID = ?";
            $stmt = $this->bd->prepare($sql);
            $stmt->bind_param('si', $senhaHash, $usuarioId);

            $stmt->execute();

            // Exiba uma mensagem de sucesso
            echo "Senha redefinida com sucesso!";
            header('Location:/logout');

        } else {
            // Exiba o formulário para redefinir a senha
            ?>
            <div class='d-flex justify-content-center align-items-center' id='base'>


                <div id='recu'>
                    <form method='post'>


                        <div class='m-3 row'>
                            <h1>Recuperação de senha</h1>
                        </div>
                        <div class='m-3 row'>
                            <label for='nova_senha' class='row col-form-label'>Nova Senha:</label>
                            <div class='row'>
                                <input type='text' class='form-control' name='nova_senha' id='nova_senha'
                                       placeholder='senha' required>
                            </div>
                        </div>

                        <div class='mt-5 m-3 row'>
                            <div class='offset-sm-4 col-sm-8 d-flex justify-content-end'>

                                <button type='submit' class='btn button m-2'>redefinição de senha</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
            <?php
        }


    }
}