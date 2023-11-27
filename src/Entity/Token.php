<?php

namespace artorganizer\Entity;

use DateInterval;
use DateTime;
use Exception;

class Token
{
    private int $id;

    private string $token;

    private int $id_user;
    private string $data_expiracao;

    /**
     * @throws Exception
     */
    function __construct($id_user)
    {
        $this->id_user = $id_user;
        $this->token = bin2hex(random_bytes(2));

        $dataAtual = new DateTime();
        $dataIntervalo = new DateInterval('PT10M');
        $dataExpiracao = $dataAtual->add($dataIntervalo);
        $this->data_expiracao = $dataExpiracao->format('Y-m-d H:i:s');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function getDataExpiracao(): string
    {
        return $this->data_expiracao;
    }
}