<?php include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/privateHead.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/header.php"; ?>
<?php //include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/images/decks/"; 
?>

<body class='d-flex vh-100 align-items-center justify-content-center text-center flex-wrap overflow-start'>

  <main class='container d-flex justify-content-center align-items-center'>
    <div class='row bg-white container-shadow container-size'>
      <div class='col-6 container-card py-2'>

        <form class='container d-flex flex-wrap justify-content-around h-98' id="deck-table">

          <?php require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/deckSelectHome.php"; ?>

        </form>
      </div>
      <div class='col-3 container-card mb-5'>
        <div class='container d-flex flex-wrap justify-content-center'>
          <div class='table-container table-scrollbar' id='deck-list'>
            <table class='table table-sm table-hover table-bordered scroll-bar'>
              <thead class='thead-color'>
                <tr class='table-fixed-header'>
                  <th class="minWidthTableCardName" scope='col table-fixed-header'>Carta</th>
                  <th class="minWidthTableCardSpecial" scope='col table-fixed-header'>Especial</th>
                  <th class="minWidthTableCardIcon" scope='col table-fixed-header'> <i class="fas fa-star text-warning"> </th>
                </tr>
              </thead>
              <tbody class="noselect">
                <!-- Substituir depois por código PHP que vai atualizar com o banco de dados-->
                <?php 
                  If (isset($_GET['deckId'])) { 
                    $deckIdCard = $_GET['deckId'];
                    include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/cardSelectHome.php";
                  } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class='col-3 container-card'>
        <div class='container d-flex flex-wrap flex-column justify-content-center h-100 align-items-center'>
              <?php 
                if (isset($_GET['deckUrl'])) {
                  $urlDeckImageBD = "./images/decks/" . $_GET['deckUrl'];
                  ?> <img class='img-fluid mt-4 d-block deckHomeImageControl' width="220px" height="100px" id="deckHomeImage" src='<?php echo $urlDeckImageBD ?>'> <?php
                } else {
                  ?> <img class='img-fluid mt-4 d-block rounded' src='https://via.placeholder.com/300x400'> <?php
                }
              ?>
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