<body class='d-flex vh-100 align-items-center justify-content-center text-center flex-wrap overflow-start'>

  <?php

  require $_SERVER['DOCUMENT_ROOT'] . '/Mega-Triunfo/Projeto/public/html/partials/head.php';
  include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/deckManage.php";
  include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/partials/header.php";

  ?>

  <main class='container d-flex justify-content-center align-items-center'>
    <div class='row bg-white container-shadow container-size'>
      <div class='col-3 container-card d-flex align-items-center vh-80'>
        <div class='container d-flex flex-wrap justify-content-center'>
          <div class='w-100 m-auto d-flex justify-content-center'>
            <img src='https://via.placeholder.com/300x400' class='mt-4 d-block mb-4' height="300px" style='object-fit: cover;' id='deckImageView'>
          </div>
          <button id='btn-new-deck' class='manage-card-buttons'>
            Novo Baralho
            <span class='manage-card-buttons-border'></span>
          </button>

          <button id='btn-add-card' class='manage-card-buttons mb-4 mt-3'>
            Gerenciar Cartas
            <span class='manage-card-buttons-border'></span>
          </button>

        </div>
      </div>

      <div class='col-6 d-flex flex-wrap align-content-center justify-content-center container-card'>
        <h1 class='h2 mb-5'>Cadastro de Baralho</h1>

        <form class='row mx-auto' id='create-deck-form' method="post" action='' enctype='multipart/form-data'>

          <div class="col-8 input-group image-container m-2 mx-auto">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="deckImage" name='deckImage' accept='.png, .jpg, .jpeg'>
              <label class="custom-file-label text-left" for="deckImage" id='deckImagelbl'>Escolher foto</label>
            </div>
          </div>

          <div class='col-10 mt-3 mx-auto text-center'>
            <label for='name' class='d-block'>Nome</label>
            <input type='text' id='deckname' name='name' class='input-form' required>
          </div>

          <div class='col-6 mt-4 text-center'>
            <label for='attribute1' class='d-block'>Nome do Atributo 1</label>
            <input type='text' id='deckattribute1' name='attribute1' class='input-form' required>
          </div>

          <div class='col-6 mt-4 text-center'>
            <label for='attribute2' class='d-block'>Nome do Atributo 2</label>
            <input type='text' id='deckattribute2' name='attribute2' class='input-form' required>
          </div>

          <div class='col-6 mt-3 text-center'>
            <label for='attribute3' class='d-block'>Nome do Atributo 3</label>
            <input type='text' id='deckattribute3' name='attribute3' class='input-form' required>
          </div>

          <div class='col-6 mt-3 text-center'>
            <label for='attribute4' class='d-block'>Nome do Atributo 4</label>
            <input type='text' id='deckattribute4' name='attribute4' class='input-form' required>
          </div>



          <div class='card-buttons d-flex mx-auto mt-5'>
            <button type='submit' id='btn-save-deck' name="action" value="Salvar" class='m-2 manage-card-buttons savebtn' onclick='saveButton();'>
              <i class="fas fa-save"></i>
              <span class='manage-card-buttons-border'></span>
            </button>

            <button type='submit' id='btn-delete-deck' name="action" value="Excluir" class='m-2 manage-card-buttons deletebtn' onclick='deleteButton();'>
              <i class="fas fa-trash-alt"></i>
              <span class='manage-card-buttons-border'></span>
            </button>
          </div>
          <!--Conversão da variável PHP em JS -->
          <script>
            var $PHPEditArray = '';
            $PHPEditArray = <?php echo $jsDeckQuery; ?>;
          </script>

        </form>
      </div>

      <div class='col-3 d-flex flex-wrap justify-content-center container-card d-flex align-items-center vh-80'>
        <div class='table-container table-scrollbar' id='deck-list'>
          <table class='table table-sm table-hover table-bordered'>
            <thead class='thead-color'>
              <tr class='table-fixed-header'>
                <th scope='col table-fixed-header'>Baralhos</th>
                <th scope='col table-fixed-header'>Cartas</th>
                <th scope='col'><i class='fas fa-tasks'></i></i></th>
              </tr>
            </thead>
            <tbody>
              <?php require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/deckSelect.php"; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    </div>


</body>

</html>