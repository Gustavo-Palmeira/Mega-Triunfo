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
}

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
    window.location.href = "http://localhost/Reposit_GIT/megaTriunfo/Projeto/public/html/create-deck.php?idForEdit=" + parseInt(element.getAttribute('name'));
  });
});

// Função para atualizar os campos do item selecionado com o array que veio da consulta PHP
function updateInputsForDeckEdit() {
  document.querySelector(DOMStrings.deckName).value = $PHPEditArray[0]['Name'];
  document.querySelector(DOMStrings.deckAtt1).value = $PHPEditArray[0]['Attribute1'];
  document.querySelector(DOMStrings.deckAtt2).value = $PHPEditArray[0]['Attribute2'];
  document.querySelector(DOMStrings.deckAtt3).value = $PHPEditArray[0]['Attribute3'];
  document.querySelector(DOMStrings.deckAtt4).value = $PHPEditArray[0]['Attribute4'];
  document.querySelector(DOMStrings.deckPhoto).value = $PHPEditArray[0]['Photo'];
}

updateInputsForDeckEdit();

