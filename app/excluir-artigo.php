<?php

require_once __DIR__ . "/../vendor/autoload.php";

use artorganizer\Repository\ArtigoRepository;
use src\Artigo\Artigo;


unset($_SESSION['id_excluirArtigo']);
try {
    if (!isset($_GET['id_artigo']) || (!isset($_SESSION['user_id']))) {
       die();
    }else{
       $id_artigo = $_GET['id_artigo'];
       $id_user = $_SESSION['user_id'];
    }

    

    if (isset($_SESSION['id_pasta'])) {
        $id_pasta = $_SESSION['id_pasta'];
    } else {

        $query = $conexao->prepare("
        SELECT  * FROM pasta_user 
        INNER join pastas ON pasta_user.id_pasta = pastas.id
        WHERE pasta_user.id_user = ? AND pastas.nome_pasta = 'root'

        ");
        $query->bind_param("s", $id_user);
        $query->execute();
        $resultado = $query->get_result();
        $dados = $resultado->fetch_array(MYSQLI_ASSOC);

        $id_pasta = $dados['id_pasta'];
    }

    $artigo = new ArtigoRepository($conexao);
    $artigo->excluir($id_artigo);

    header("Location:/home");

} catch (Exception $error) {
    echo "Erro ao excluir <br>" . $error;
}
