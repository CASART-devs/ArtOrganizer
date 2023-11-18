<?php


try {
    if(isset($_GET['id_artigo'])){
        $id= $_GET['id_artigo'];
        $_SESSION['id_artigo'] = $id;
    }else{
        $id = $_SESSION['id_artigo'];
        unset($_SESSION['id_artigo']);
    }

    $query = $conexao->prepare("SELECT * FROM artigos WHERE ID = ?");
    $query->bind_param("i", $id);
    $query->execute();

    $resultado = $query->get_result(); 

    $dados = $resultado->fetch_all(MYSQLI_ASSOC);

    
          
    
} catch (Exception $error) {
    echo "erro na query $error";
}
?>


<body>


    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col d-flex justify-content-center align-itens-center m-5" id="content">
                <form enctype="multipart/form-data" action="/atualizarArtigo" method="post">                                                                                                              
                <div class="container " id="informacoesArtigo">
                    <div class="row">
                        <h1>Informações do Artigo</h1>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="mb-3">
                              <label for="nomeArtigo" class="form-label">Nome</label>
                              <input type="text"
                                class="form-control" name="nomeArtigo" id="nomeArtigo" aria-describedby="helpId" placeholder="<?= $dados[0]['Titulo']; ?>" required>
                              <small id="helpId" class="form-text text-muted">Renomeie o Artigo</small>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="mb-3">
                              <label for="artigo" class="form-label">Artigo</label>
                              <input type="file" class="form-control" name="artigo" id="artigo" placeholder="artigo" aria-describedby="fileHelpId" required>
                              <div id="fileHelpId" class="form-text">Selecione outro artigo</div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="mb-3">
                              <label for="autor" class="form-label">Autor</label>
                              <input type="text"
                                class="form-control" name="autor" id="autor" aria-describedby="helpId" placeholder="<?= $dados[0]['Autor']; ?>" required>
                              <small id="helpId" class="form-text text-muted">Renomeie o autor</small>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="mb-3">
                              <label for="imgArtigo" class="form-label">Capa do artigo</label>
                              <img src="../upload/artigo/img/<?= $dados[0]['img-previw']; ?>" class="img-fluid m-2" alt="">
                              <input type="file" class="form-control" name="imgArtigo" id="imgArtigo" placeholder="imgArtigo" aria-describedby="fileHelpId" required>
                              <div id="fileHelpId" class="form-text">Selecione outro capa</div>
                            </div>
                        </div>                                                                                                        
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end align-itens-center">
                            <a name="voltar" id="btn_voltar" class="btn button m-2" href="/home" role="button">voltar</a>
                            <button type="submit" class="btn button m-2">Atualizar</button>
                            <a name="download" id="btn_download" class="btn button m-2" href="/upload/artigo/artigo/<?= $dados[0]['artigo-caminho']; ?>" target="_blank" >Download</a>
                        </div>
                    </div>
                </div>
                </form>

            </div>



            <!--sidebar Menu -->

            <?php require_once "app/sidebar.php"; ?>

        </div>

    </div>
</body>


</html>