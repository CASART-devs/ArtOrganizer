<?php

use artorganizer\Repository\PastaRepository;

try {

    if (!isset($_GET['id_pasta'])) {
        die();
    } else {
        $id_pasta = $_GET['id_pasta'];
    }

    
    $pastaRepository = new PastaRepository($conexao);
    $pastaRepository->excluir($id_pasta);

    header("Location:/home");
} catch (Exception $error) {

    echo "Erro ao excluir <br>" . $error;
}
