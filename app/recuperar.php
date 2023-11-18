
<body>
    <div class="d-flex justify-content-center align-items-center" id="base">

    
        <div  id="recu">
            <form action="/processar_solicitacao" method="post" >
                

                    <div class="m-3 row" >
                        <h1>Recuperação de senha</h1>
                    </div>
                    <div class="m-3 row">
                        <label for="email" class="row col-form-label">Endereço de email:</label>
                        <div class="row">
                            <input type="text" class="form-control" name="email" id="email" placeholder="<?= $_SESSION['Email']; ?>">
                        </div>
                    </div>
                    
                    <div class="mt-5 m-3 row">
                        <div class="offset-sm-4 col-sm-8 d-flex justify-content-end">
                            <a name="cancelar" id="cancelar" class="btn button m-2" href="/home" role="button">Cancelar</a>
                            <button type="submit" class="btn button m-2">Solicitar redefinição de senha</button>
                        </div>
                    </div>
                
            </form>
        </div>
    
    </div>
    


</body>

</html>