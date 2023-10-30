document.addEventListener("DOMContentLoaded", function () {
    const btnEsconderMenu = document.getElementById("botao-esconder-menu");
    const btnEsconderAmigos = document.getElementById("botao-esconder-amigos");

   

    const sidebar_menu = document.querySelector(".barra-menu");
    const sidebar_amigos = document.querySelector(".barra-amigos");

    btnEsconderMenu.addEventListener("click", function () {
        //menu.classList.toggle("esconder");
        //h2_menu.classList.toggle("esconder");  
        sidebar_menu.classList.toggle("fechado"); 
    });

    btnEsconderAmigos.addEventListener("click", function () {
        //amigos.classList.toggle("esconder");
        //h2_amigos.classList.toggle("esconder");
        sidebar_amigos.classList.toggle("fechado"); 
    });

});
