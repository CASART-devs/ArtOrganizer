<?php  

    use artorganizer\Entity\Pasta;
    use artorganizer\Repository\PastaRepository;

    $nome = $_POST['nome-pasta'];
    $desc = $_POST['desc-pasta'];
    $id_user = $_SESSION['ID'];

    try {
        //adiciona pasta no banco
        $pastaRepository = new PastaRepository($conexao);
        $pasta = new Pasta($nome, $desc);
        $pastaRepository->add($id_user, $pasta);

        $id_pasta = $pasta->getId();

        header("Location:/home");
    } catch (Exception $error) {
        echo "Não foi possivel criar pasta $error";
    }
