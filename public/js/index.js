
const btnEntrar = document.querySelector("#btnEntrar");
const btnCadastrar = document.getElementById("btnCadastrar");
const popupLogin = document.querySelector("#popupLogin");
const popupCadastrar = document.querySelector("#popupCadastrar");
const btnFechar = document.querySelector("#fechar");

function validateArtigoFile() {
  const fileArtigo = document.getElementById("artigo");
  const fileArtigoName = fileInput.value;
  if (fileArtigoName.endsWith(".html")) {
      alert("Arquivos HTML não são permitidos. Por favor, selecione outro arquivo.");
      fileArtigo.value = ""; // Limpa o campo de arquivo
      return false;
  }
  return true;
}
function validateImgFile() {
  const fileimg = document.getElementById("img-previw");
  const fileimgName = fileInput.value;
  if ((fileimgName.endsWith(".jpg")) || (fileimgName.endsWith(".jpeg")) ||  (fileimgName.endsWith(".png")) ||  (fileimgName.endsWith("svg"))){
      alert("Arquivos não permitidos. Por favor, selecione outro arquivo.");
      fileimg.value = ""; // Limpa o campo de arquivo
      return false;
  }
  return true;
}



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


