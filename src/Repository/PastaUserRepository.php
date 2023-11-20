<?php
    namespace artorganizer\Repository;

    class PastaUserRepository{

        function __construct(private \mysqli $bd)
        {
            
        }

        function add(int $id_user, int $id_pasta):bool
        {
            $query = $this->bd->prepare("INSERT INTO `pasta_user` (`id_user`, `id_pasta`) VALUES (?, ?)");
            $query->bind_param("ii", $id_user, $id_pasta);

            $result = $query->execute();

            return $result;
        }

        function excluir(int $id):bool
        {
            $query = $this->bd->prepare("DELETE FROM pasta_user WHERE id_pasta = ?");
            $query->bind_param("i", $id);
            $result = $query->execute();

            return $result;
        }
    }