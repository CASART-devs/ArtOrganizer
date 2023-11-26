<body>


<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

    <a class="navbar-brand col-4 col-md-2" href="#">
        <img alt="Logo" class="mx-3 d-inline-block align-text-top" src="/img/logos/logo_dark.png" width="6923"
             style="width: 7rem">
    </a>

    <div class="collapse navbar-collapse justify-content-center" id="navbar_links">
        <div class="navbar-nav" id="navbar">
            <a class="nav-item nav-link" href="#banner1" id="artOrganizer-menu">ArtOrganizer</a>
            <a class="nav-item nav-link" href="#banner2" id="adicionar-menu">Adicionar</a>
            <a class="nav-item nav-link" href="#banner3" id="organizar-menu">Organizar</a>
            <a class="nav-item nav-link" href="#banner4" id="compartilhar-menu">Compartilhar</a>
            <a class="nav-item nav-link" href="#banner5" id="contatos-menu">Contatos</a>
        </div>
    </div>


    <?php if(isset($_SESSION['error'])) { ?>
        <div class="modal" style="display:block" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p><?= $_SESSION['error']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn button" href="/excluirSessao">Fechar</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="col">
        <div class="d-flex justify-content-around justify-content-md-end align-items-center">
            <button class="button btn mx-2" data-bs-target="#loginModal" data-bs-toggle="modal" id="btnEntrar"
                    type="button">
                Entrar
            </button>

            <button class="button btn mx-2" data-bs-target="#cadastrarModal" data-bs-toggle="modal" id="btnCadastrar"
                    type="button">

                Cadastrar
            </button>
        </div>
    </div>

    <!--<button aria-controls="navbar_links" aria-expanded="false" aria-label="togler navigation" class="navbar-toggler"
            data-target="#navbar_links" data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>-->

</nav>

<!--modals-->
<div aria-hidden="true" aria-labelledby="loginModalLabel" class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <form action="/login" method="post">
                <div class="modal-body">


                    <div class="mb-3">
                        <label class="form-label" for="email_log">Email </label>
                        <input aria-describedby="emailHelp" class="form-control" id="email_log" name="email_log"
                               type="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="senha_log">Senha</label>
                        <input class="form-control" id="senha_log" name="senha_log" type="password">
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Fechar</button>
                    <button class="btn button " id="enviar_log" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="cadastrarModalLabel" class="modal fade" id="cadastrarModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar</h1>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <form action="/cadastrar" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="nome_cad">Nome </label>
                        <input class="form-control" id="nome_cad" name="nome_cad" required type="text">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="user_cad">Nickname </label>
                        <input class="form-control" id="user_cad" name="user_cad" required type="text">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email_cad">Email </label>
                        <input aria-describedby="emailHelp" class="form-control" id="email_cad" name="email_cad"
                               required type="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="senha_cad">Senha</label>
                        <input class="form-control" id="senha_cad" name="senha_cad" required type="password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nasc_cad">Data de Nacimento</label>
                        <input id="nasc_cad" max="2008-08-16" name="nasc_cad" required type="date"
                               value="2023-08-">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Fechar</button>
                    <button class="btn button" id="enviar_cad" type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Banners -->
<section class="container-fluid d-flex flex-column justify-content-center align-items-center" id="banner1">
    <h1 class="display-1 fw-semibold text-justify">ArtOrganizer</h1>
    <h2 class="text-justify">Sua nova biblioteca digital</h2>
</section>

<section class="container-fluid d-flex justify-content-center py-5" id="banner2">

    <div class="container  d-flex flex-column align-items-center justify-content-center overflow-auto w-100 ">
        <h1 class="display-4 fw-semibold text-justify m-3">Adicione artigos com facilidade</h1>

        <p class=" lead  text-justify m-3">Com ArtOrganizer, os usuários podem facilmente compartilhar
            seus
            conhecimentos e perspectivas com a comunidade de entusiastas de artigos. Adicionar um novo artigo é
            simples: basta inserir um título, autor, capa e conteúdo. Compartilhe seu conhecimento hoje
            mesmo!
        </p>
    </div>

</section>

<section class="container-fluid d-flex justify-content-center py-5" id="banner3">

    <div class="container row">

        <div class="container-fluid col-md-4">
            <img alt="" class="object-fit-cover mb-4" src="/img/home_imgs/banner3.jpg" srcset="">
        </div>

        <div class="container d-flex flex-column align-items-center justify-content-center overflow-auto  col-md-8">
            <h1 class="display-4 fw-semibold text-justify m-3">Organização de Artigos</h1>

            <p class=" lead  text-justify m-3">Com o ArtOrganizer, os usuários podem criar pastas
                personalizadas para organizar seus artigos de acordo com temas, projetos ou preferências
                individuais. Isso ajuda a manter seus artigos organizados e fáceis de encontrar, para poder ser
                acessados rapidamente quando necessário.</p>
        </div>
    </div>
</section>

<section class="container-fluid d-flex justify-content-center py-5" id="banner4">

    <div class="container row">

        <div class="container d-flex flex-column align-items-center justify-content-center overflow-auto  col-md-8">

            <h1 class="display-5 fw-semibold text-justify m-3">
                Compartilhamento
                de Artigos</h1>
            <p class=" lead  text-justify m-3">Os usuários do
                ArtOrganizer podem compartilhar facilmente seus artigos com outros usuários da plataforma ou por
                de plataformas de mídia social. Isso permite que os usuários alcancem um público mais amplo e
                compartilhem seus conhecimentos com outras pessoas interessadas no mesmo assunto.</p>

        </div>

        <div class="container-fluid col-md-4">
            <img alt="banner 3" class="object-fit-cover mb-4" src="/img/home_imgs/banner4.jpg">
        </div>
    </div>
</section>

<!-- Rodapé-->
<section class="container-fluid d-flex justify-content-center pt-5 " id="banner5">

    <div class="container row ">

        <div class="row">
            <h1>Contatos</h1>
            <p>Entre em contato conosco para dúvidas, sugestões ou reclamações. Sua
                opinião é
                importante para nós.</p>
        </div>

        <div class="row">
            <div class="col-md m-3">
                <div class="overflow-auto">
                    <h1 class="text-justify">Telefone</h1>
                </div>
                <div class="overflow-auto">
                    <p class="text-justify">(48) 99140-7636</p>
                </div>
                <div class="overflow-auto">
                    <p class="text-justify">(48) 9977-4587</p>
                </div>
            </div>
            <div class="col-md m-3">
                <div class="overflow-auto">
                    <h1 class="text-justify">Email</h1>
                </div>
                <div class="overflow-auto">
                    <p class="text-justify">Art.Organizer01@gmail.com</p>
                </div>
            </div>
            <div class="col-md m-3">
                <div class="overflow-auto">
                    <h1 class="text-justify">Instagram</h1>
                </div>
                <div class="overflow-auto">
                    <p class="text-justify">artorganizer_</p>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
