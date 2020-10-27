
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




document.querySelector("#deck-list").addEventListener("scroll", function () {
  let translate = "translate(0," + this.scrollTop + "px)";
  this.querySelector("thead").style.transform = translate;
});
