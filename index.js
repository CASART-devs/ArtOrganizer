const btnEntrar = document.querySelector("#btnEntrar");
const btnCadastrar = document.getElementById("btnCadastrar");
const popupLogin = document.querySelector("#popupLogin");
const popupCadastrar = document.querySelector("#popupCadastrar");
const btnFechar = document.querySelector("#fechar");



function fcPopupLogin() {
  popupLogin.showModal();
}

function fcPopupCadastrar() {
  popupCadastrar.showModal();
}

function fcPopupFechar() {
    popupLogin.close();

    popupCadastrar.close();
}