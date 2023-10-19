<?php

namespace src\Artigo;

    class Artigo{
        private int $id;
        private string $titulo;
        private string $autor;
        private string $dataPublicacao;
        private string $imgCaminho;
        private string $artigoCaminho;
        private string $id_tag;

        public function __construct(string $tituloArtigo,string $autorArtigo ,string $img, string $artigo){
            $this->setTitulo($tituloArtigo);
            $this->setAutor($autorArtigo);
            date_default_timezone_set('America/Sao_Paulo');
            $dataPublicacao = date('Y-m-d H:i:s');
            $this->setDataPublicacao($dataPublicacao);
            $this->setImgCaminho($img);
            $this->setArtigoCaminho($artigo);
        }

        public function inserirArtigo(  $bd){
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
    }