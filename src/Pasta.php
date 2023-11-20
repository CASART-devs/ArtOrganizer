<?php
namespace artorganizer\src;

    class Pasta{
        private int $id;
        private string $nome;
        private string $descricao;
        
        public function __construct(string $nomePasta, string $descricaoPasta){
            
            $this->setNome($nomePasta);
            $this->setDescricao($descricaoPasta);

        }

        public function inserirPasta($bd){
            $query = $bd->prepare("
                INSERT INTO `pastas`
                (nome_pasta, descricao) 
                VALUES 
                (?, ?);
            ");

        $query->bind_param("ss", $this->getNome(), $this->getDescricao());
        $query->execute();

        $this->setId($bd->insert_id);

        return true;

        }

        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
        }

        public function getId(): int
        {
                return $this->id;
        }

        public function getNome(): string
        {
                return $this->nome;
        }

        public function setNome(string $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        public function getDescricao(): string
        {
                return $this->descricao;
        }

        public function setDescricao(string $descricao): self
        {
                $this->descricao = $descricao;

                return $this;
        }


       
    }
    