<?php

try {
    


    if (!isset($_GET['id_pasta'])) {
       die();
    }else{
       $id_pasta = $_GET['id_pasta'];
       
    }

    $query = $conexao->prepare("DELETE FROM pasta_user WHERE id_pasta = ?");
    $query->bind_param("i", $id_pasta);
    $query->execute();
    
    $query = $conexao->prepare('DELETE FROM pastas
    WHERE id= ?;');
    $query->bind_param('i', $id_pasta);
    $query->execute();

    header("Location:/home");

} catch (Exception $error) {
    echo "Erro ao excluir <br>" . $error;
}
