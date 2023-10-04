<?php
    session_start();
    require_once "/xampp/htdocs/artorganizer-original/model/validar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artorganizer</title>
</head>
<body>
    <form action="processar_solicitacao.php" method="post">
        <label for="email">Endereço de email:</label>
        <input type="email" name="email" placeholder="<?php echo $_SESSION['Email']; ?>">
        <button type="submit">Solicitar redefinição de senha</button>
    </form>
</body>
</html>