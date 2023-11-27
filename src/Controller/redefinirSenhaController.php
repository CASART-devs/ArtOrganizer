<?php

namespace artorganizer\Controller;

use mysqli;
use Override;

readonly class redefinirSenhaController implements Controller
{

    private mysqli $bd;

    public function __construct(array $repository)
    {
        $this->bd = $repository['conexao'];
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

    }
}