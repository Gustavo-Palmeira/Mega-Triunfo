<?php

session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/head.php"; ?>

<body class='d-flex vh-100 align-items-center justify-content-center text-center flex-wrap overflow-start'>

  <?php include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/header.php"; ?>

  <main class='container d-flex justify-content-center align-items-center'>
    <div class='row bg-white container-shadow container-size'>
      <div class='col-6 container-card py-2'>
        <form class='container d-flex flex-wrap justify-content-around h-98' id="deck-table">
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>
          <div class="d-flex flex-column-reverse">
            <img class="pt-1 pb-2 rounded border-card" id="" src="https://via.placeholder.com/110x150px">
            <label for="img1">Nome Baralho</label>
          </div>

        </form>
      </div>
      <div class='col-3 container-card mb-5'>
        <div class='container d-flex flex-wrap justify-content-center'>
          <div class='table-container table-scrollbar' id='deck-list'>
            <table class='table table-sm table-hover table-bordered scroll-bar'>
              <thead class='thead-color'>
                <tr class='table-fixed-header'>
                  <th scope='col table-fixed-header'>Baralhos</th>
                  <th scope='col table-fixed-header'>Cartas</th>
                </tr>
              </thead>
              <tbody class="noselect">
                <!-- Substituir depois por código PHP que vai atualizar com o banco de dados-->
                <?php require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/deckSelectHome.php"; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class='col-3 container-card'>
        <div class='container d-flex flex-wrap flex-column justify-content-center h-100 align-items-center'>
          <img class='img-fluid mt-4 d-block rounded' src='https://via.placeholder.com/300x400'>
          <button id='btn-new-card' class='manage-card-buttons mt-3'>
            Jogar
            <span class='manage-card-buttons-border'></span>
          </button>
        </div>
      </div>
    </div>
    </div>
</body>

</html>