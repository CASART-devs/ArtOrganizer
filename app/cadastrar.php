<?php
require_once('conexao.php');

$nome = $conexao->real_escape_string($_POST['nome_cad']);
$email = $conexao->real_escape_string($_POST['email_cad']);
$senha = $conexao->real_escape_string($_POST['senha_cad']);
$senha_segura = password_hash($senha, PASSWORD_DEFAULT);
$nasc = $conexao->real_escape_string($_POST['nasc_cad']);
$user = $conexao->real_escape_string($_POST['user_cad']);



try {
    $mysqli_insert = $conexao->prepare("INSERT INTO `Usuarios`(`nome_Usuario`, `Senha`, `Nome_Completo`, `Email`, `Data_nasc`) VALUES (?, ?, ?, ?, ?);");
    $mysqli_insert->bind_param("sssss", $user, $senha_segura, $nome, $email, $nasc);
    if($mysqli_insert->execute()){
        $user_id = $conexao->insert_id;



        $query = $conexao->prepare("SELECT usuarios.*, pastas.nome_pasta
        FROM usuarios
        INNER JOIN pasta_user ON usuarios.id = pasta_user.id_user
        INNER JOIN pastas ON pastas.id = pasta_user.id_pasta
        WHERE pastas.nome_pasta = 'root' AND usuarios.id = ?;");
        $query->bind_param("s", $user_id);
        $query->execute();

        $result = $query->get_result();
        
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if(count($rows) === 0){
            $id = 0;

            $query = $conexao->prepare("INSERT INTO `pastas`(`nome_pasta`, `descricao`)  VALUES ('root', 'pasta pincipal');");
            $query->execute();
            $pasta_id = $conexao->insert_id;

            $query = $conexao->prepare("INSERT INTO `pasta_user` (`id_user`, `id_pasta`) VALUES (?, ?);");
            $query->bind_param("ss", $user_id, $pasta_id);
            $query->execute();
        }    
        header("location:../index.php");
    }
    
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
