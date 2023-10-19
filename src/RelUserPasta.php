<?php

namespace src\RelaUserPasta;

    class RelUserPasta{
        private int $id;
        private int $id_artigo;
        private int $id_pasta;

        function __construct(int $pasta, int $artigo)
        {
            $this->setIdPasta($pasta);
            $this->setIdArtigo($artigo);

        }

        function inserirRelacionameto($bd){
            $query = $bd->prepare("INSERT INTO `artigo_pasta`(`id_pasta`, `id_artigo`) VALUES (?,?)");
            $query->bind_param("ss", $this->getIdPasta(), $this->getIdArtigo());
            $query->execute();

            $this->setId($bd->insert_id);
        }


        /**
         * Get the value of id
         *
         * @return int
         */
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @param int $id
         *
         * @return self
         */
        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of id_artigo
         *
         * @return int
         */
        public function getIdArtigo(): int
        {
                return $this->id_artigo;
        }

        /**
         * Set the value of id_artigo
         *
         * @param int $id_artigo
         *
         * @return self
         */
        public function setIdArtigo(int $id_artigo): self
        {
                $this->id_artigo = $id_artigo;

                return $this;
        }

        /**
         * Get the value of id_pasta
         *
         * @return int
         */
        public function getIdPasta(): int
        {
                return $this->id_pasta;
        }

        /**
         * Set the value of id_pasta
         *
         * @param int $id_pasta
         *
         * @return self
         */
        public function setIdPasta(int $id_pasta): self
        {
                $this->id_pasta = $id_pasta;

                return $this;
        }
    }