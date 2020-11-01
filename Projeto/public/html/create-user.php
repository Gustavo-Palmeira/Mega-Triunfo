<?php include('partials/head.php') ?>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row">
      <div class="col-12 mx-auto text-center bg-white" id="box-border">
        <form id="box-form" action="create-user.php">
          <h1 class="text-uppercase h2"> Criar Conta </h1>
          <label class="mt-3 mb-0" for=""> Usuário </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible" type="text">
            <img class="icon-style ml-4" src="../img/icons/user.svg" alt="Ícone usuário">
          </div>
          <label class="mb-0" for=""> E-mail </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible" type="text">
            <img class="icon-style ml-4" src="../img/icons/email.svg" alt="Ícone e-mail">
          </div>
          <label class="mb-0" for=""> Senha </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible password-type" type="password">
            <img class="icon-style icon-eye-style ml-4" src="../img/icons/eye.svg" alt="Ícone senha"
              onclick="changePassword()">
          </div>
          <label class="mb-0" for=""> Confirmar Senha </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible" type="password" onpaste="return false" ondrop="return false">
            <img class="icon-style ml-4" src="../img/icons/key.svg" alt="Ícone senha">
          </div>
          <button href="#" class="btn-submit mx-auto mt-2">
            <span class="btn-border"></span>
            <img class="icon-style icon-arrow-style" src="../img/icons/arrow.svg" alt="Ícone senha">
          </button>
          <a class="mt-5 text-dark" href="../../index.php"> Voltar </a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>