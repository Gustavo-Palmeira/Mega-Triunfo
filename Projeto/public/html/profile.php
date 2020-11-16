<?php include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/head.php"; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/header.php"; ?>



<body class='d-flex flex-column vh-100 align-content-center justify-content-around text-center'>

  <main class='container d-flex justify-content-center align-items-center'>
    <div class='row bg-white container-shadow'>
      <div class='col-6 container-card py-2'>
      <span class='h4 mt-3'>Nome do Usuário</span>
      </div>
      <div class='col-3 container-card'>
      </div>
      <div class='col-3 container-card'>
        <div class='container d-flex flex-wrap justify-content-center'>
          <span class='h4 mt-3'>Nome do Baralho</span>
          <button id='btn-new-card' class='manage-card-buttons mt-3'>
            Nova carta
            <span class='manage-card-buttons-border'></span>
          </button>
          <button id='btn-close-deck' class='manage-card-buttons mt-3'>
            Fechar baralho
            <span class='manage-card-buttons-border'></span>
          </button>
        </div>
      </div>
    </div>
  </main>
</body>
<!-- Fazer uma query no BD, virar admin será um mailto para um admin e alterar senha será uma alteração no bd-->

</html>