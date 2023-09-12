document.addEventListener("DOMContentLoaded", function () {
    const btnEsconderMenu = document.getElementById("botao-esconder-menu");
    const btnEsconderAmigos = document.getElementById("botao-esconder-amigos");
    const menu = document.getElementById("menu");
    const amigos = document.getElementById("amigos");
    //const barraMenus = document.getElementById("barra-menu");
    //const barraAmigos = document.getElementById("barra-amigos");
    const h2_amigos = document.getElementById("h2_amigos");
    const h2_menu = document.getElementById("h2_menu");

    btnEsconderMenu.addEventListener("click", function () {
        menu.classList.toggle("esconder");
        h2_menu.classList.toggle("esconder");   
    });

    btnEsconderAmigos.addEventListener("click", function () {
        amigos.classList.toggle("esconder");
        h2_amigos.classList.toggle("esconder");
        if(amigos.classList.contains("esconder")){
            amigos.classList.remove("col-2");
        }
    });

});
