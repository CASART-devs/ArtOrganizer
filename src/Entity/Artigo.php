<?php

namespace artorganizer\Entity;

class Artigo
{
    private int $id;
    private string $titulo;
    private string $autor;
    private string $dataPublicacao;
    private string $img;
    private string $artigo;
    private string $pasta;


    public function __construct(string $titulo, string $autor, string $img, string $artigo)
    {
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setImg($img);
        $this->setArtigo($artigo);
        date_default_timezone_set('America/Sao_Paulo');
        $this->setDataPublicacao(date('Y-m-d H:i:s'));
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


    public function getImg(): string
    {
        return $this->img;
    }


    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }


    public function getArtigo(): string
    {
        return $this->artigo;
    }


    public function setArtigo(string $artigo): self
    {
        $this->artigo = $artigo;

        return $this;
    }


    public function getPasta(): string
    {
        return $this->pasta;
    }


    public function setPasta(string $pasta): self
    {
        $this->pasta = $pasta;

        return $this;
    }
}
