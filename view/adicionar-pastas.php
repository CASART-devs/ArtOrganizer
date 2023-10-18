<?php
    session_start();
    require_once "../model/conexao.php";

    $nome = $_POST['nome-pasta'];
    $desc = $_POST['desc-pasta'];
    $id_user = $_SESSION['ID'];

    try {
        //adiciona pasta no banco
        $query = $conexao->prepare("
            INSERT INTO `pastas`
            (nome_pasta, descricao) 
            VALUES 
            (?, ?);
        ");

        $query->bind_param("ss", $nome, $desc);
        $query->execute();
        $id_pasta = $conexao->insert_id;
        //adiciona relacionamento user-pasta no banco
        $query = $conexao->prepare("INSERT INTO `pasta_user` (`id_user`, `id_pasta`) VALUES (?, ?);");
        $query->bind_param("ss", $id_user, $id_pasta );
        $query->execute();

        header("Location: home.php");
    } catch (Exception $error) {
        echo "Não foi possivel criar pasta $error";
    }
    