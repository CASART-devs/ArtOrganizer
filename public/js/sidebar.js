document.addEventListener("DOMContentLoaded", function() {
    const btnEsconderMenu = document.getElementById("botao-esconder-menu");
    const btnEsconderAmigos = document.getElementById("botao-esconder-amigos");


    const sidebar_menu = document.querySelector(".barra-menu");
    const sidebar_amigos = document.querySelector(".barra-amigos");

    btnEsconderMenu.addEventListener("click", function() {
        sidebar_menu.classList.toggle("fechado");
    });

    btnEsconderAmigos.addEventListener("click", function() {
        sidebar_amigos.classList.toggle("fechado");
    });

});
