<?php

namespace artorganizer\Repository;

use artorganizer\Entity\Token;
use mysqli;

readonly class  TokenRepository
{

    public function __construct(private mysqli $bd)
    {
    }

    function add(Token $token): string
    {
        $code = $token->getToken();
        $id_user = $token->getIdUser();
        $data = $token->getDataExpiracao();

        // Inserção na tabela
        $query = $this->bd->prepare("
            INSERT INTO `rec_senha`
            (token, id_user, data_expiracao)
            VALUES
            (?,?,?);
        ");

        $query->bind_param("sss", $code, $id_user, $data);

        $query->execute();
        $token->setId($this->bd->insert_id);

        return $token->getToken();
    }
}