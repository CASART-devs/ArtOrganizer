<?php

namespace src\Artigo;

use mysqli;

    class Artigo{
        private int $id;
        private string $titulo;
        private string $autor;
        private string $dataPublicacao;
        private string $imgCaminho;
        private string $artigoCaminho;
        private string $pasta;
        private string $id_tag;

        public function criarArtigo(string $tituloArtigo,string $autorArtigo ,string $img, string $artigo){
            $this->setTitulo($tituloArtigo);
            $this->setAutor($autorArtigo);
            date_default_timezone_set('America/Sao_Paulo');
            $dataPublicacao = date('Y-m-d H:i:s');
            $this->setDataPublicacao($dataPublicacao);
            $this->setImgCaminho($img);
            $this->setArtigoCaminho($artigo);
        }

        public function inserirArtigo($bd){
            $query = $bd->prepare("
                INSERT INTO `artigos`
                (`Titulo`, `Autor`, `Data_Publicacao`, `img-previw`, `artigo-caminho`) 
                VALUES 
                (?,?,?,?,?)
            ");
            $query->bind_param("sssss", $this->getTitulo(), $this->getAutor(), $this->getDataPublicacao(), $this->getImgCaminho(), $this->getArtigoCaminho());
            $query->execute();

            $this->setId($bd->insert_id);

            return true;
        }

        function excluirArtigo($bd){

            $query = $bd->prepare("DELETE FROM artigo_pasta WHERE id_artigo = ?");
            $query->bind_param("i", $this->getId());
            $query->execute();

            $query = $bd->prepare("DELETE FROM artigos WHERE id = ?;");
            $query->bind_param("s", $this->getId());
            $query->execute();
        }
    

        function carregarArtigo(mysqli $bd, int $id_artigo, int $id_pasta):array
        {
            $this->setId($id_artigo);
            $this->setPasta($id_pasta);

            $artigo_query = $bd->prepare("
                SELECT * FROM artigos
                INNER JOIN artigo_pasta ON artigos.ID = artigo_pasta.id_artigo
                INNER JOIN pastas ON pastas.id = artigo_pasta.id_pasta
                INNER join pasta_user ON pastas.id = pasta_user.id_pasta
                WHERE artigo_pasta.id_pasta = ? AND pasta_user.id_user = ?; 
            ");
            
            $artigo_query->bind_param("ii", $this->getPasta(),  $this->getId());
            $artigo_query->execute();

            $resultArtigo = $artigo_query->get_result();

            if ($resultArtigo->num_rows > 0) {
                $dadosArtigo = $resultArtigo->fetch_assoc();
        
                $this->setTitulo($dadosArtigo['Titulo']);
                $this->setAutor($dadosArtigo['Autor']);
                $this->setDataPublicacao($dadosArtigo['Data_Publicacao']);
                $this->setImgCaminho($dadosArtigo['img-previw']);
                $this->setArtigoCaminho($dadosArtigo['artigo-caminho']);
        
                return [
                    'ID' => $this->getId(),
                    'Titulo' => $this->getTitulo(),
                    'Autor' => $this->getAutor(),
                    'Data_Publicacao' => $this->getDataPublicacao(),
                    'img-previw' => $this->getImgCaminho(),
                    'artigo-caminho' => $this->getArtigoCaminho()
                ];
            }else{
                return ["erro" => "erro ao carregar dados"];
            }
        }

        public function getId(): int
        {
                return $this->id;
        }

        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
        }

       
        public function getTitulo(): string
        {
                return $this->titulo;
        }

        
        public function setTitulo(string $titulo): self
        {
                $this->titulo = $titulo;

                return $this;
        }

        
        public function getAutor(): string
        {
                return $this->autor;
        }

        
        public function setAutor(string $autor): self
        {
                $this->autor = $autor;

                return $this;
        }

       
        public function getDataPublicacao(): string
        {
                return $this->dataPublicacao;
        }

       
        public function setDataPublicacao(string $dataPublicacao): self
        {
                $this->dataPublicacao = $dataPublicacao;

                return $this;
        }

       
        public function getImgCaminho(): string
        {
                return $this->imgCaminho;
        }

        
        public function setImgCaminho(string $imgCaminho): self
        {
                $this->imgCaminho = $imgCaminho;

                return $this;
        }

        
        public function getArtigoCaminho(): string
        {
                return $this->artigoCaminho;
        }

       
        public function setArtigoCaminho(string $artigoCaminho): self
        {
                $this->artigoCaminho = $artigoCaminho;

                return $this;
        }

        /**
         * Get the value of pasta
         *
         * @return string
         */
        public function getPasta(): string
        {
                return $this->pasta;
        }

        /**
         * Set the value of pasta
         *
         * @param string $pasta
         *
         * @return self
         */
        public function setPasta(string $pasta): self
        {
                $this->pasta = $pasta;

                return $this;
        }
    }