<?php include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/head.php"; ?>

<body class='d-flex vh-100 align-items-center justify-content-center flex-wrap overflow-start'>
  <?php include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/header.php"; ?>

  <main class='container d-flex justify-content-center align-items-center'>
    <div class='row bg-white container-shadow container-size'>
      <div class='col-12 container w-100 d-flex flex-row flex-wrap justify-content-center align-items-center'>
        <h1 class="w-100 text-center my-3 mx-auto">Perfil</h1>
        <div class='mx-auto '>
          <div class="my-5">
            <span class='h5 mt-3'>Nome</span>
            <h3>Arthur Escalera</h3>
          </div>

          <div class="my-5">
            <span class='h5 mt-3'>Usuário</span>
            <h3>Arthur Escalera</h3>
          </div>
        </div>
        <div class='mx-auto '>
          <div class="my-5">
            <span class='h5 mt-3'>Email</span>
            <h3>Arthur Escalera</h3>
          </div>
          <div class="my-5">
            <span class='h5 mt-3'>Nível de Usuário</span>
            <h3>Arthur Escalera</h3>
          </div>
        </div>



        <div class='container d-flex flex-row justify-content-center align-items-center'>
          <div class='container d-flex flex-wrap justify-content-center'>
            <button class='manage-card-buttons btn-std mx-auto'>
              Alterar Senha
              <span class='manage-card-buttons-border'></span>
            </button>
            <button class='manage-card-buttons btn-std mx-auto'>
              Se Tornar Admin
              <span class='manage-card-buttons-border'></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
<!-- Fazer uma query no BD, virar admin será um mailto para um admin e alterar senha será uma alteração no bd-->

</html>