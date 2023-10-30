<?php
    session_start();
    require_once "conexao.php";
    require_once "../vendor/autoload.php";
    require_once "../src/Pasta.php";
    use src\Pasta\Pasta;

    $nome = $_POST['nome-pasta'];
    $desc = $_POST['desc-pasta'];
    $id_user = $_SESSION['ID'];

    try {
        //adiciona pasta no banco
        $pasta = new Pasta($nome, $desc);
        $pasta->inserirPasta($conexao);

        $id_pasta = $pasta->getId();

        //adiciona relacionamento user-pasta no banco
        $query = $conexao->prepare("INSERT INTO `pasta_user` (`id_user`, `id_pasta`) VALUES (?, ?);");
        $query->bind_param("ss", $id_user, $id_pasta );
        $query->execute();

        header("Location: home.php");
    } catch (Exception $error) {
        echo "Não foi possivel criar pasta $error";
    }
    