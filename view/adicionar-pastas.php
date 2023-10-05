<?php
    session_start();
    require_once "/xampp/htdocs/artorganizer-original/model/conexao.php";

    $nome = $_POST['nome-pasta'];
    $desc = $_POST['desc-pasta'];
    $id_user = $_SESSION['ID'];

    try {
        $query = $conexao->prepare("
            INSERT INTO `pastas`
            (nome_pasta, descricao, id_user) 
            VALUES 
            (?, ?, ?);
        ");

        $query->bind_param("sss", $nome, $desc, $id_user);
        $query->execute();
        header("Location: home.php");
    } catch (Exception $error) {
        echo "Não foi possivel criar pasta $error";
    }
    