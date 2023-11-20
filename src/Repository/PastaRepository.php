<?php

    namespace artorganizer\src\Repository;

    use artorganizer\src\Entity\Pasta;

    class PastaRepository
    {

        function __construct(private \mysqli $bd)
        {
        }

        public function add(pasta $pasta): bool
        {
            $query = $this->bd->prepare("
                INSERT INTO `pastas`
                (`nome_pasta`, `descricao`) 
                VALUES 
                (?,?)
            ");
            $query->bind_param("ss", $pasta->getNome(), $pasta->getDescricao());
            $result = $query->execute();

            $pasta->setId($this->bd->insert_id);

            return $result;
        }

        public function excluir(int $id): bool
        {


            $query = $this->bd->prepare("DELETE FROM pasta_user WHERE id_pasta = ?");
            $query->bind_param("i", $id);
            $query->execute();

            $query = $this->bd->prepare("DELETE FROM pasta WHERE id = ?;");
            $query->bind_param("i", $id);
            $result = $query->execute();

            return $result;
        }

        public function update(Pasta $pasta): bool
        {
            $query = $this->bd->prepare("
                        UPDATE `pastas`
                        SET nome_pasta = ?, descricao = ? 
                        WHERE id = ?
                ");

            $query->bind_param("ssi", $pasta->getNome(), $pasta->getDescricao(), $pasta->getId());
            $result = $query->execute();

            return $result;
        }

        public function all(int $user, $pasta): array
        {

            $query = $this->bd->prepare("SELECT pastas.* FROM pastas INNER JOIN pasta_user ON pastas.id = pasta_user.id_pasta WHERE pasta_user.id_user = ?;");
            $query->bind_param("s", $_SESSION['ID']);


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
    }
