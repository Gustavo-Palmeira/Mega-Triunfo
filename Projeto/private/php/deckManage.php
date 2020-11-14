<?php

require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/database/db.php";

// ANTIGO ARQUIVO deckAdd.php - Faz o INSERT e o UPDATE dos baralhos
if (isset($_POST['action']) && $_POST['action'] === 'Salvar') {

    //Se o método GET[idForEdit] estiver setado, ele fará um UPDATE conforme o ID passado, caso contrário fará um INSERT
    if (isset($_GET['idForEdit'])) {

        if (!file_exists($_FILES['deckImage']['tmp_name']) || !is_uploaded_file($_FILES['deckImage']['tmp_name'])) {

            $queryParam = null;

        } else {

            include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/deckImage.php";
            $queryParam =  ', deckPhoto = :deckPhotoBind';
        }

        $dbQuery = $database->prepare("UPDATE deck SET
                                           deckName = :deckNameBind,
                                           deckAtt1Name = :deckAtt1NameBind,
                                           deckAtt2Name = :deckAtt2NameBind,
                                           deckAtt3Name = :deckAtt3NameBind,
                                           deckAtt4Name = :deckAtt4NameBind
                                           $queryParam
                                           WHERE deckId = :deckIdBind;");

        $dbQuery->bindValue(':deckIdBind', $_GET['idForEdit']);

    } else {

        if (!file_exists($_FILES['deckImage']['tmp_name']) || !is_uploaded_file($_FILES['deckImage']['tmp_name'])) {
            // NOTA: substituir por caminho de imagem padrão
            $targetDatabase = '';

        } else {

            include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/deckImage.php";
            $queryParam = 'ok';
        }

        $dbQuery = $database->prepare("INSERT INTO deck (
                                           deckName, 
                                           deckAtt1Name, 
                                           deckAtt2Name, 
                                           deckAtt3Name, 
                                           deckAtt4Name,
                                           deckPhoto)

                                VALUES (  :deckNameBind,
                                          :deckAtt1NameBind,
                                          :deckAtt2NameBind,
                                          :deckAtt3NameBind,
                                          :deckAtt4NameBind,
                                          :deckPhotoBind);");
    }


    $dbQuery->bindValue(':deckNameBind', $_POST['name']);
    $dbQuery->bindValue(':deckAtt1NameBind', $_POST['attribute1']);
    $dbQuery->bindValue(':deckAtt2NameBind', $_POST['attribute2']);
    $dbQuery->bindValue(':deckAtt3NameBind', $_POST['attribute3']);
    $dbQuery->bindValue(':deckAtt4NameBind', $_POST['attribute4']);
    if ($queryParam !== null) $dbQuery->bindValue(':deckPhotoBind', $targetDatabase);

    $dbQuery->execute();

} 

// ANTIGO ARQUIVO deckDelete.php - deleta os baralhos
else if (isset($_POST['action']) && $_POST['action'] === 'Excluir' && isset($_GET['idForEdit'])) {

    $dbQuery = $database->prepare("DELETE FROM deck WHERE deckId = :deckIdBind;");
    $dbQuery->bindValue(':deckIdBind', $_GET['idForEdit']);

    if ($dbQuery->execute()) header('Location: /Mega-Triunfo/Projeto/public/html/create-deck.php');
}

// ANTIGO ARQUIVO deckEdit.php - seleciona o baralho para edição
if (isset($_GET['idForEdit'])) {

    $dbQuery = $database->prepare("SELECT deckId, 
                                    deckName, 
                                    deckAtt1Name, 
                                    deckAtt2Name, 
                                    deckAtt3Name, 
                                    deckAtt4Name, 
                                    deckPhoto 
                                    FROM deck WHERE deckId = :deckIdBind");

    $dbQuery->bindValue(':deckIdBind', $_GET['idForEdit']);
    $dbQuery->execute();

    foreach ($dbQuery as $deckSelect) {

        $deckQuery[] = [
            'Id' => $deckSelect['deckId'],
            'Name' => $deckSelect['deckName'],
            'Attribute1' => $deckSelect['deckAtt1Name'],
            'Attribute2' => $deckSelect['deckAtt2Name'],
            'Attribute3' => $deckSelect['deckAtt3Name'],
            'Attribute4' => $deckSelect['deckAtt4Name'],
            'Photo' => $deckSelect['deckPhoto']
        ];
    };

    // Convertendo o Array PHP em um Array JavaScript
    $jsDeckQuery = json_encode($deckQuery);
}