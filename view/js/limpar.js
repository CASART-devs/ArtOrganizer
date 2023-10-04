const login = document.querySelector("#enviar_log");
const senha_log = document.querySelector("#senha_log");
const email_log = document.querySelector("#email_log");

const cadastrar = document.querySelector("#enviar_cad");
const senha_cad = document.querySelector("#senha_cad");
const nome_cad = document.querySelector("#nome_cad");
const user_cad = document.querySelector("#user_cad");
const email_cad = document.querySelector("#email_cad");
const nasc_cad = document.querySelector("#nasc_cad");

function limpar(){
    senha_log.value = "";
    email_log.value = "";
    nome_cad.value = "";
    user_cad.value = "";
    senha_cad.value = "";
    email_cad.value = "";
    nasc_cad.value = "";
    
}

login.onClick = function(){
    limpar();
}

cadastrar.onClick = function(){
    limpar();
}
