<?php

namespace artorganizer\Repository;

use artorganizer\Entity\Pasta;
use mysqli;


readonly class PastaRepository
{

    function __construct(private mysqli $bd)
    {
    }

    public function add(int $user, pasta $pasta): bool
    {
        $nome = $pasta->getNome();
        $desc = $pasta->getDescricao();

        $query = $this->bd->prepare("
                INSERT INTO `pastas`
                (`nome_pasta`, `descricao`) 
                VALUES 
                (?,?)
            ");
        $query->bind_param("ss", $nome, $desc);
        $inserir = $query->execute();

        $pasta->setId($this->bd->insert_id);

        $pastaUser = new PastaUserRepository($this->bd);
        $relacionar = $pastaUser->add($user, $pasta->getId());

        if ($inserir && $relacionar) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir(int $id): bool
    {
        $artigoPasta = new ArtigoPastaRepository($this->bd);
        $artigoPasta->excluir($id);

        $pastaUser = new PastaUserRepository($this->bd);
        $pastaUser->excluir($id);

        $query = $this->bd->prepare("DELETE FROM pastas WHERE id = ?;");
        $query->bind_param("i", $id);
        return $query->execute();
    }

    public function update(Pasta $pasta): bool
    {
        $nome = $pasta->getNome();
        $desc = $pasta->getDescricao();
        $id = $pasta->getId();

        $query = $this->bd->prepare("
                        UPDATE `pastas`
                        SET nome_pasta = ?, descricao = ? 
                        WHERE id = ?
                ");

        $query->bind_param("ssi", $nome, $desc,  $id);
        return $query->execute();
    }

    public function all(int $id): array
    {

        $query = $this->bd->prepare("SELECT pastas.* FROM pastas INNER JOIN pasta_user ON pastas.id = pasta_user.id_pasta WHERE pasta_user.id_user = ?;");
        $query->bind_param("i", $id);


        $query->execute();
        $result = $query->get_result();
        $pastaList = $result->fetch_all(MYSQLI_ASSOC);

        return array_map(
            function ($dados) {
                $pasta = new pasta($dados['nome_pasta'], $dados['descricao']);
                $pasta->setId($dados['id']);

                return $pasta;
            },

            $pastaList
        );
    }

    public function carregarInformacoes(int $id): array
    {
        $query = $this->bd->prepare("SELECT * FROM pastas WHERE id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        $pastaList = $result->fetch_all(MYSQLI_ASSOC);

        return array_map(
            function ($dados) {
                $pasta = new Pasta($dados['nome_pasta'], $dados['descricao']);
                $pasta->setId($dados['id']);

                return $pasta;
            },

            $pastaList
        );
    }
}
