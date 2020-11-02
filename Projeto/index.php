<?php include('./public/html/partials/indexHead.php') ?>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row">
      <div class="col-12 mx-auto text-center bg-white mt-5" id="box-border">
        <form id="box-form-login" action="login.php">
          <img class="logo" src="./public/img/logo-mega-triunfo.svg">
          <!-- <h1 class="text-uppercase"> Login </h1> -->
          <label class="mb-0" for=""> Usuário </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible" type="text">
            <img class="icon-style" src="./public/img/icons/user.svg" alt="Ícone usuário">
          </div>
          <label class="mt-2 mb-0" for=""> Senha </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible password-type" type="password">
            <img class="icon-style icon-eye-style" src="./public/img/icons/eye.svg" alt="Ícone senha"
              onclick="changePasswordIndex()">
          </div>
          <button href="#" class="btn-submit mx-auto mt-2">
            <span class="btn-border"></span>
            <img class="icon-style icon-arrow-style" src="./public/img/icons/arrow.svg" alt="Ícone senha">
          </button>

          <a class="mt-5 text-dark" href="./public/html/change-password.php"> Esqueci minha senha </a>
          <a class="text-dark" href="./public/html/create-user.php"> Criar uma conta </a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>