<?php

    return [
        "GET|/" => \artorganizer\Controller\landingpageController::class,
        "POST|/login" => \artorganizer\Controller\loginController::class,
        "POST|/cadastrar" => \artorganizer\Controller\cadastroController::class,
        "GET|/redefinir_senha" => \artorganizer\Controller\formRedefinirSenhaController::class,
        "POST|/redefinir_senha" => \artorganizer\Controller\redefinirSenhaController::class,
        "GET|/home" => \artorganizer\Controller\homeController::class,
        "GET|/explorar" => \artorganizer\Controller\explorarController::class,
        //aqui
        "GET|/pesquisa" => \artorganizer\Controller\pesquisaController::class,
        "GET|/logout" => \artorganizer\Controller\logoutController::class,
        "GET|/configuracao" => \artorganizer\Controller\configuracaoController::class,
        "GET|/atualizacao" => \artorganizer\Controller\atualizacaoController::class,
        "GET|/adicionarArtigo" => \artorganizer\Controller\addArtigoController::class,
        "GET|/informacaoArtigo" => \artorganizer\Controller\infoArtigoController::class,
        "GET|/atualizarArtigo" => \artorganizer\Controller\attArtigoController::class,
        "GET|/excluirArtigo" => \artorganizer\Controller\excluirArtigoController::class,
        "GET|/adicionarPasta" => \artorganizer\Controller\addPastaController::class,
        "GET|/informacaoPasta" => \artorganizer\Controller\infoPastaController::class,
        "GET|/excluirPasta" => \artorganizer\Controller\excluirPastaController::class,
        "GET|/atualizarPasta" => \artorganizer\Controller\attPastaController::class,
        "GET|/pegarIdExcluir" => \artorganizer\Controller\pegarIdExcluir::class,
        "GET|/excluirSessao" => \artorganizer\Controller\excluirSessaoController::class,
        "GET|/voltar" => \artorganizer\Controller\voltarController::class,
        "GET|/pegarSessao" => \artorganizer\Controller\pegarSessaoController::class,
        "GET|/recuperar" => \artorganizer\Controller\recuperarController::class,
        "GET|/processar_solicitacao" => \artorganizer\Controller\processarSolicitacaoController::class,
        // Adicione mais rotas conforme necessário
    ];
