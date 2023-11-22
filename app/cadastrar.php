<?php

use artorganizer\Entity\Pasta;
use artorganizer\Entity\Usuario;
use artorganizer\Repository\PastaRepository;
use artorganizer\Repository\UsuarioRepository;

$nome = $conexao->real_escape_string($_POST['nome_cad']);
$email = $conexao->real_escape_string($_POST['email_cad']);
$senha = $conexao->real_escape_string($_POST['senha_cad']);
$nasc = $conexao->real_escape_string($_POST['nasc_cad']);
$nick = $conexao->real_escape_string($_POST['user_cad']);

try {
    //cadastra usuario
    $UsuarioRepository = new UsuarioRepository($conexao);
    $Usuario = new Usuario($nick, $nome, $email, $nasc);
    $Usuario->setSenha(password_hash($senha, PASSWORD_DEFAULT));
    $UsuarioRepository->add($Usuario);

    //cria pasta root
    $pastaRepository = new PastaRepository($conexao);
    $pasta = new Pasta("root", "Pasta princípal");
    $pastaRepository->add($Usuario->getId(),$pasta);

    header("location:/");
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
