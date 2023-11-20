<?php

use artorganizer\Entity\Pasta;
use artorganizer\Repository\PastaRepository;

$id = $_SESSION['id_infopasta'];

$nome = $_POST['nomePasta'];
$desc = $_POST['desc'];



try {

    if (($nome == "") || ($desc == "")) {

        die();
    } else {

        $pastaRepository = new PastaRepository($conexao);
        $pasta = new Pasta($nome, $desc);
        $pasta->setId($id);
        $pastaRepository->update($pasta);
    }

    header("Location:/informacaoPasta");
} catch (Exception $error) {

    echo "Erro ao atualizar!  ($error) <br>";
    echo "Clique <a href='configuracao.php'>aqui</a> para voltar";
}
