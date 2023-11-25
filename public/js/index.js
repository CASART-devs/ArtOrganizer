const popupLogin = document.querySelector("#popupLogin");
const popupCadastrar = document.querySelector("#popupCadastrar");

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


