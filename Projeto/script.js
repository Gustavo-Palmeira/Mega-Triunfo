
function changePassword() {
  let eye = document.querySelector('.icon-eye-style').getAttribute('src');
  let password = document.querySelector('.password-type').type;
  if (eye === "icons/eye.svg" && password === "password") {
    document.querySelector('.icon-eye-style').src = "icons/hide-eye.svg";
    document.querySelector('.password-type').type = "text";
  } else {
    document.querySelector('.icon-eye-style').src = "icons/eye.svg";
    document.querySelector('.password-type').type = "password";
  }
}
