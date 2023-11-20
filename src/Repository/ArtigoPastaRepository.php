<?php

namespace artorganizer\Repository;

    class ArtigoPastaRepository{

        function __construct(private \mysqli $bd)
        {

        }

        function add(int $id_pasta, int $id_artigo):bool
        {
            $query = $this->bd->prepare("INSERT INTO `artigo_pasta`(`id_pasta`, `id_artigo`) VALUES (?,?)");
            $query->bind_param("ss", $id_pasta, $id_artigo);
            $result =$query->execute();

            return $result;
        }

    }