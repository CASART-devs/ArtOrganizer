<?php

namespace artorganizer\Entity;


class Arquivo{

    private string $pasta;
    private string $nome;
    private string $extensao;
    private string $caminho;

    public function __construct(string $caminho, array $arquivo)
    {
        $this->setPasta($caminho);
        $this->setNome(uniqid());
        $this->setExtensao('.' . strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION)));
        $this->setCaminho($this->getPasta() . $this->getNome() . $this->getExtensao());

        return $this->getCaminho();

    }

    public function moverArtigo(array $arquivo){

        if (($this->getExtensao() ==  '.pdf') ||  ($this->getExtensao() ==  '.docx') || ($this->getExtensao() ==  '.txt')){
            move_uploaded_file($arquivo['tmp_name'], $this->getCaminho());
        }else{
            return false;
        }
        
    }

    public function moverImg(array $arquivo){
        
        if (($this->getExtensao() ==  '.jpg') ||  ($this->getExtensao() ==  '.jpeg') || ($this->getExtensao() ==  '.png' || ($this->getExtensao() ==  '.svg'))){
            move_uploaded_file($arquivo['tmp_name'], $this->getCaminho());
        }else{
            return false;
        }
        
    }

    public function gerarNome() :string
    {
        $nome = ($this->getNome() . $this->getExtensao());
        return $nome;
    }




    /**
     * Get the value of nome
     *
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param string $nome
     *
     * @return self
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getExtensao(): string
    {
        return $this->extensao;
    }

    /**
     * Set the value of extensao
     *
     * @param string $extensao
     *
     * @return self
     */
    public function setExtensao(string $extensao): self
    {
        $this->extensao = $extensao;

        return $this;
    }

    /**
     * Get the value of caminho
     *
     * @return string
     */
    public function getCaminho(): string
    {
        return $this->caminho;
    }

    /**
     * Set the value of caminho
     *
     * @param string $caminho
     *
     * @return self
     */
    public function setCaminho(string $caminho): self
    {
        $this->caminho = $caminho;

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