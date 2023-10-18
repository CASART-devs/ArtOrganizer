<?php
session_start();
require_once "../model/conexao.php";

try {
    if (isset($_GET['id_artigo'])) {
        $id_artigo = $_GET['id_artigo'];
    }

    $query = $conexao->prepare("DELETE FROM artigo_pasta WHERE id_artigo = ?");
    $query->bind_param("i", $id_artigo);
    $query->execute();

    $query = $conexao->prepare("DELETE FROM artigos WHERE id = ?;");
    $query->bind_param("s", $id_artigo);
    $query->execute();

    header("Location: home.php");
} catch (Exception $error) {
    echo "Erro ao excluir <br>" . $error;
}
