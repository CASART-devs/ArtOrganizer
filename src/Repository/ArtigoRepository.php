<?php

namespace artorganizer\Repository;

use artorganizer\Entity\Artigo;
use mysqli;

readonly class ArtigoRepository
{


    public function __construct(private mysqli $bd)
    {
    }


    public function add(int $id_pasta, Artigo $artigo): bool
    {
        $titulo = $artigo->getTitulo();
        $autor = $artigo->getAutor();
        $data = $artigo->getDataPublicacao();
        $img = $artigo->getImg();
        $artigoCaminho = $artigo->getArtigo();

        $query = $this->bd->prepare("
                INSERT INTO `artigos`
                (`Titulo`, `Autor`, `Data_Publicacao`, `img-previw`, `artigo-caminho`) 
                VALUES 
                (?,?,?,?,?)
            ");
        $query->bind_param("sssss", $titulo, $autor, $data, $img, $artigoCaminho);
        $inserir = $query->execute();

        $artigo->setId($this->bd->insert_id);

        $RelArtigoPasta = new ArtigoPastaRepository($this->bd);

        $relacionar = $RelArtigoPasta->add($id_pasta, $artigo->getId());

        if ($inserir && $relacionar) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir(int $id): bool
    {

        $query = $this->bd->prepare("DELETE FROM artigo_pasta WHERE id_artigo = ?");
        $query->bind_param("s", $id);
        $query->execute();

        $query = $this->bd->prepare("DELETE FROM artigos WHERE id = ?;");
        $query->bind_param("s", $id);
        return $query->execute();
    }


    public function update(Artigo $artigo): bool
    {
        $titulo = $artigo->getTitulo();
        $autor = $artigo->getAutor();
        $img = $artigo->getImg();
        $artigoCaminho = $artigo->getArtigo();
        $id = $artigo->getId();

        $query = $this->bd->prepare("
                        UPDATE `artigos`
                        SET titulo = ?, autor = ?, `img-previw` = ?, `artigo-caminho` = ? 
                        WHERE ID = ?
                ");

        $query->bind_param("ssssi", $titulo, $autor, $img, $artigoCaminho, $id);
        return $query->execute();
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
        } else {
            die();
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

    public function explorar(): array
    {
        $query = $this->bd->prepare("SELECT * FROM artigos");

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

    public function pesquisa($pesquisa): array
    {
        $query = $this->bd->prepare("SELECT * FROM artigos where Titulo like ?;");
        $pesquisa = "%" . $pesquisa . "%";
        $query->bind_param('s', $pesquisa);
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

    public function carregarInformacoes(int $id): array
    {
        $query = $this->bd->prepare("SELECT * FROM artigos where ID = ?;");
        $query->bind_param('s', $id);
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
