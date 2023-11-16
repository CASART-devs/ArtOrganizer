<?php
    session_start();
    require_once "validar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artorganizer</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/recuperacao.css">

</head>

<body>
    <div class="d-flex justify-content-center align-items-center" id="base">

    
        <div  id="recu">
            <form action="processar_solicitacao.php" method="post" >
                

                    <div class="m-3 row" >
                        <h1>Recuperação de senha</h1>
                    </div>
                    <div class="m-3 row">
                        <label for="email" class="row col-form-label">Endereço de email:</label>
                        <div class="row">
                            <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $_SESSION['Email']; ?>">
                        </div>
                    </div>
                    
                    <div class="mt-5 m-3 row">
                        <div class="offset-sm-4 col-sm-8 d-flex justify-content-end">
                            <a name="cancelar" id="cancelar" class="btn button m-2" href="home.php" role="button">Cancelar</a>
                            <button type="submit" class="btn button m-2">Solicitar redefinição de senha</button>
                        </div>
                    </div>
                
            </form>
        </div>
    
    </div>
    


</body>

</html>