// NOTA: Dividir as funcionalidades de JS conforme o modelo MVC
let DOMStrings = {
  // LOGIN
  eyeIcon: '.icon-eye-style',
  passwordInput: '.password-type',
  // TABELAS
  cardDecklist: '#deck-list',
  thead: 'thead',
  editIconsList: document.querySelectorAll('.editIcon'),
  // INPUTS DA TELA DE DECKS
  deckName: '#name',
  deckAtt1: '#attribute1',
  deckAtt2: '#attribute2',
  deckAtt3: '#attribute3',
  deckAtt4: '#attribute4',
  deckPhoto: '#deckPhoto',
  deckPhotoFileInput: '#deckImage',
  deckPhotolbl: '#deckImagelbl',
  deckImageView: '#deckImageView',
  deckPhotoPOST: '#deckPhotoPOST',
  // BOTÕES
  newDeckbtn: '#btn-new-deck',
  deleteDeckbtn: '#btn-delete-deck',
  saveDeckbtn: '#btn-save-deck'
}

// Função troca visibilidade da senha
function changePasswordIndex() {
  let eye = document.querySelector('.icon-eye-style').getAttribute('src');
  let password = document.querySelector('.password-type').type;

  if (eye === "./public/img/icons/eye.svg" && password === "password") {
    document.querySelector('.icon-eye-style').src = "./public/img/icons/hide-eye.svg";
    document.querySelector('.password-type').type = "text";
  } else {
    document.querySelector('.icon-eye-style').src = "./public/img/icons/eye.svg";
    document.querySelector('.password-type').type = "password";
  };
};

function changePasswordPrivate() {
  let eye = document.querySelector('.icon-eye-style').getAttribute('src');
  let password = document.querySelector('.password-type').type;

  if (eye === "../../public/img/icons/eye.svg" && password === "password") {
    document.querySelector('.icon-eye-style').src = "../../public/img/icons/hide-eye.svg";
    document.querySelector('.password-type').type = "text";
  } else {
    document.querySelector('.icon-eye-style').src = "../../public/img/icons/eye.svg";
    document.querySelector('.password-type').type = "password";
  };
};

function changePassword() {
  let eye = document.querySelector('.icon-eye-style').getAttribute('src');
  let password = document.querySelector('.password-type').type;

  if (eye === "../img/icons/eye.svg" && password === "password") {
    document.querySelector('.icon-eye-style').src = "../img/icons/hide-eye.svg";
    document.querySelector('.password-type').type = "text";
  } else {
    document.querySelector('.icon-eye-style').src = "../img/icons/eye.svg";
    document.querySelector('.password-type').type = "password";
  };
};

// NOTA: Transformar em função
document.querySelector(DOMStrings.cardDecklist).addEventListener('scroll', function () {
  let translate = "translate(0,' + this.scrollTop + 'px)";
  document.querySelector(DOMStrings.thead).style.transform = translate;
});

// NOTA: Transformar em função - Para cada elemento do tipo "ícone de edição", adicionar uma função ao clique que redireciona para a mesma página, porém setando o método GET com o ID do item clicado
DOMStrings.editIconsList.forEach(element => {
  element.addEventListener('click', function () {
    window.location.href = "/Mega-Triunfo/Projeto/public/html/create-deck.php?idForEdit=" + parseInt(element.getAttribute('name'));
  });
});

// NOTA: Transformar em função - Ao clique que "Novo baralho", reseta a página
document.querySelector(DOMStrings.newDeckbtn).addEventListener('click', function () {
  window.location.href = "/Mega-Triunfo/Projeto/public/html/create-deck.php";
});

// NOTA: Transformar em função - Alert para salvamento (adição ou edição) de novos baralhos 
document.querySelector(DOMStrings.saveDeckbtn).addEventListener('click', function () {
  if (window.location.href.includes('?idForEdit=')) {
    alert('Baralho alterado!');
  } else {
    alert('Baralho salvo!')
  }
});

// NOTA: Transformar em função - Alert para confirmação de exclusão de baralho
document.querySelector(DOMStrings.deleteDeckbtn).addEventListener('click', function () {
  if (window.location.href.includes('?idForEdit=')) {
    confirm ('Deseja deletar o baralho e suas cartas? Não é possível recuperá-los.');
    alert('Baralho deletado!');
  } else {
    alert('É necessário selecionar um baralho para deletar.')
  }
});

// NOTA: Transformar em função - Alterando o label e a prévia da imagem quando uma imagem for carregada
document.querySelector(DOMStrings.deckPhotoFileInput).addEventListener('change', function () {

  if (this.files[0].size > 5242880) {
    alert('Tamanho máximo excedido (5 MB).');
    this.value = '';
  }

  document.querySelector(DOMStrings.deckPhotolbl).textContent = document.querySelector(DOMStrings.deckPhotoFileInput).value;
  readURL(document.querySelector(DOMStrings.deckPhotoFileInput));
});

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          document.querySelector(DOMStrings.deckImageView).src = e.target.result;
      }  
      reader.readAsDataURL(input.files[0]);
  }
}

// Função para atualizar os campos do item selecionado com o array que veio da consulta PHP
function updateInputsForDeckEdit() {
  if (window.$PHPEditArray) {
    document.querySelector(DOMStrings.deckName).value = $PHPEditArray[0]['Name'];
    document.querySelector(DOMStrings.deckAtt1).value = $PHPEditArray[0]['Attribute1'];
    document.querySelector(DOMStrings.deckAtt2).value = $PHPEditArray[0]['Attribute2'];
    document.querySelector(DOMStrings.deckAtt3).value = $PHPEditArray[0]['Attribute3'];
    document.querySelector(DOMStrings.deckAtt4).value = $PHPEditArray[0]['Attribute4'];
    document.querySelector(DOMStrings.deckImageView).src = $PHPEditArray[0]['Photo'];
  }
}

updateInputsForDeckEdit();