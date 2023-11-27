<?php

namespace artorganizer\Repository;

use mysqli;

readonly class ArtigoPastaRepository
{

    function __construct(private mysqli $bd)
    {

    }

    function add(int $id_pasta, int $id_artigo): bool
    {
        $query = $this->bd->prepare("INSERT INTO `artigo_pasta`(`id_pasta`, `id_artigo`) VALUES (?,?)");
        $query->bind_param("ss", $id_pasta, $id_artigo);
        return $query->execute();
    }

    public function excluir(int $id): bool
    {
        $query = $this->bd->prepare("DELETE FROM artigo_pasta WHERE id_pasta = ?");
        $query->bind_param("i", $id);
        return $query->execute();
    }

}