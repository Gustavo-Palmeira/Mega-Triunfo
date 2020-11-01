<?php include('partials/head.php') ?>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row">
      <div class="col-12 mx-auto text-center bg-white" id="box-border">
        <form id="box-form" action="change-password.php">
          <h1 class="text-uppercase h2">Trocar Senha</h1>
          <label class="mt-3 mb-0" for=""> E-mail </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible" type="text">
            <img class="icon-style ml-2" src="../img/icons/email.svg" alt="Ícone e-mail">
          </div>
          <label class="mt-3 mb-0" for=""> Confirmar E-mail </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible" type="text">
            <img class="icon-style ml-2" src="../img/icons/email.svg" alt="Ícone e-mail">
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