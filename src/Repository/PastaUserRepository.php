<?php

namespace artorganizer\Repository;

use mysqli;

readonly class PastaUserRepository
{

    function __construct(private mysqli $bd)
    {
    }

    function add(int $id_user, int $id_pasta): bool
    {
        $query = $this->bd->prepare("INSERT INTO `pasta_user` (`id_user`, `id_pasta`) VALUES (?, ?)");
        $query->bind_param("ii", $id_user, $id_pasta);

        return $query->execute();
    }

    function excluir(int $id): bool
    {
        $query = $this->bd->prepare("DELETE FROM pasta_user WHERE id_pasta = ?");
        $query->bind_param("i", $id);
        return $query->execute();
    }

    function getIdRoot($id_user): int
    {
        $query = $this->bd->prepare("
            SELECT  * FROM pasta_user 
            INNER join pastas ON pasta_user.id_pasta = pastas.id
            WHERE pasta_user.id_user = ? AND pastas.nome_pasta = 'root'

            ");

        $query->bind_param("s", $id_user);
        $query->execute();
        $resultado = $query->get_result();
        $dados = $resultado->fetch_array(MYSQLI_ASSOC);
        return $dados['id_pasta'];

    }
}