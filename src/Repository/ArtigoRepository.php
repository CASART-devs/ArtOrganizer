<?php

namespace artorganizer\Repository;

use artorganizer\Entity\Artigo;

class ArtigoRepository
{


        public function __construct(private \mysqli $bd)
        {
        }



        public function add(Artigo $artigo): bool
        {
                $query = $this->bd->prepare("
                INSERT INTO `artigos`
                (`Titulo`, `Autor`, `Data_Publicacao`, `img-previw`, `artigo-caminho`) 
                VALUES 
                (?,?,?,?,?)
            ");
                $query->bind_param("sssss", $artigo->getTitulo(), $artigo->getAutor(), $artigo->getDataPublicacao(), $artigo->getImg(), $artigo->getArtigo());
                $result = $query->execute();

                $artigo->setId($this->bd->insert_id);

                return $result;
        }

        public function excluir(int $id): bool
        {

                $query = $this->bd->prepare("DELETE FROM artigo_pasta WHERE id_artigo = ?");
                $query->bind_param("s", $id);
                $query->execute();

                $query = $this->bd->prepare("DELETE FROM artigos WHERE id = ?;");
                $query->bind_param("s", $id);
                $result = $query->execute();

                return $result;
        }


        public function update(Artigo $artigo): bool
        {
                $query = $this->bd->prepare("
                        UPDATE `artigos`
                        SET titulo = ?, autor = ?, `img-previw` = ?, `artigo-caminho` = ? 
                        WHERE ID = ?
                ");

                $query->bind_param("ssssi", $artigo->getTitulo(), $artigo->getAutor(), $artigo->getImg(), $artigo->getArtigo(), $artigo->getId());
                $result = $query->execute();

                return $result;
        }

        public function all(int $user, $pasta): array
        {


                if (gettype($pasta) === 'integer') {
                        $query = $this->bd->prepare("
                                SELECT * FROM artigos
                                INNER JOIN artigo_pasta ON artigos.ID = artigo_pasta.id_artigo
                                INNER JOIN pastas ON pastas.id = artigo_pasta.id_pasta
                                INNER join pasta_user ON pastas.id = pasta_user.id_pasta
                                WHERE artigo_pasta.id_pasta = ? AND pasta_user.id_user = ?; 
                                ");

                        $query->bind_param("ss", $pasta, $user);
                } elseif (gettype($pasta) === 'string') {
                        $query = $this->bd->prepare("
                        SELECT * FROM artigos
                        INNER JOIN artigo_pasta ON artigos.ID = artigo_pasta.id_artigo
                        INNER JOIN pasta_user ON artigo_pasta.id_pasta = pasta_user.id_pasta
                        INNER JOIN pastas ON artigo_pasta.id_pasta = pastas.id
                        WHERE pastas.nome_pasta = 'root' AND pasta_user.id_user = ?
                        ");

                        $query->bind_param("s", $user);
                }


                $query->execute();
                $result = $query->get_result();
                $artigoList = $result->fetch_all(MYSQLI_ASSOC);

                return array_map(
                        function ($dados) {
                                $artigo = new artigo($dados['Titulo'], $dados['Autor'], $dados['img-previw'], $dados['artigo-caminho']);
                                $artigo->setId($dados['ID']);

                                return $artigo;
                        },

                        $artigoList
                );
        }
}
