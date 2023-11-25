<?php

namespace artorganizer\Entity;


class Usuario
{
    private int $id;
    private string $nick;
    private string $senha;
    private string $nome;
    private string $email;
    private string $nasc;
    private string $fone;
    private string $perfilImg;

    function __construct(string $nick, string $nome, string $email, string $nasc)
    {
        $this->setNick($nick);
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setNasc($nasc);

    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNick(): string
    {
        return $this->nick;
    }

    public function setNick(string $nick): void
    {
        $this->nick = $nick;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getNasc(): string
    {
        return $this->nasc;
    }

    public function setNasc(string $nasc): void
    {
        $this->nasc = $nasc;
    }

    public function getFone(): string
    {
        return $this->fone;
    }

    public function setFone(string $fone): void
    {
        $this->fone = $fone;
    }

    public function getPerfilImg(): string
    {
        return $this->perfilImg;
    }

    public function setPerfilImg(string $perfilImg): void
    {
        $this->perfilImg = $perfilImg;
    }
}
