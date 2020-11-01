<?php include('partials/head.php') ?>

<?php include('partials/header.php') ?>

<body class='d-flex flex-column vh-100 align-content-center justify-content-around text-center'>

  <main class='container d-flex justify-content-center align-items-center'>
    <div class='row bg-white container-shadow'>
      <div class='col-3 container-card'>
        <div class='container d-flex flex-wrap justify-content-center'>
          <span class='h4 mt-3'>Nome do Baralho</span>
          <button id='btn-new-card' class='manage-card-buttons mt-3'>
            Aleatório
            <span class='manage-card-buttons-border'></span>
          </button>
        </div>
      </div>
      <div class='col-6 container-card'>
        <div class='container d-flex flex-wrap justify-content-center'>
          <span class='h4 mt-3'>Nome do Baralho</span>
          <button id='btn-new-card' class='manage-card-buttons mt-3'>
            Jogar
            <span class='manage-card-buttons-border'></span>
          </button>
        </div>
      </div>

      <div class='col-3 d-flex flex-wrap justify-content-center container-card'>
        <div class='table-container table-scrollbar' id='deck-list'>
          <table class='table table-sm table-hover table-bordered'>
            <thead class='thead-color'>
              <tr class='table-fixed-header'>
                <th scope='col-3 table-fixed-header'>Baralho</th>
                <th scope='col-3 table-fixed-header'>Cartas</th>
                <th scope='col-3'><i class='fas fa-tasks'></i></i></th>
              </tr>
            </thead>
            <tbody>
              <!-- Substituir depois por código PHP que vai atualizar com o banco de dados-->
              <tr>
                <td>Políticos</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>

              <tr>
                <td>Seleções de futebol</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Carros</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Máquinas Agrícolas</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Melhores frutas</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>

              <tr>
                <td>Políticos</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>

              <tr>
                <td>Seleções de futebol</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Carros</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Máquinas Agrícolas</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Melhores frutas</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>

              <tr>
                <td>Políticos</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>

              <tr>
                <td>Seleções de futebol</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Carros</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Máquinas Agrícolas</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>
              <tr>
                <td>Melhores frutas</td>
                <td>40</td>
                <td>
                  <i class='far fa-edit'></i>
                </td>
              </tr>



            </tbody>
          </table>
        </div>
      </div>
    </div>

</body>

</html>