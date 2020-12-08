<?php

require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/database/db.php";

// Faz o INSERT e o UPDATE das cartas
if (isset($_POST['action']) && $_POST['action'] === 'Salvar-carta') {

    // Se o método GET[idForEdit] estiver setado, ele fará um UPDATE conforme o ID passado, caso contrário fará um INSERT
    if (isset($_GET['idForEdit'])) {

        // Se a imagem não for passada, vai alterar a consulta
        if (!file_exists($_FILES['cardImage']['tmp_name']) || !is_uploaded_file($_FILES['cardImage']['tmp_name'])) {
            $queryParam = null;
        } else {

            include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/cardImage.php";
            $queryParam =  ', cardPhoto = :cardPhotoBind';
        }

        $dbQueryCard = $database->prepare("UPDATE card SET
                                                    cardName = :cardNameBind, 
                                                    cardAtt1Value = :cardAtt1Bind,  
                                                    cardAtt2Value = :cardAtt2Bind, 
                                                    cardAtt3Value = :cardAtt3Bind, 
                                                    cardAtt4Value = :cardAtt4Bind 
                                                    $queryParam
                                        WHERE cardId = :cardIdBind;");

        // Está editando se há registro, mas não insere se for nulo
        $id = preg_replace('/\D/', '', $_GET['idForEdit']);
        $dbCountSpecialAtt = $database->query("SELECT COUNT(*) FROM specialAttribute WHERE cardId = $id");
        $reg = $dbCountSpecialAtt->fetch();

        if (intval($reg[0]) > 0) {

            $dbQuerySpecial = $database->prepare("UPDATE specialAttribute SET
                                                    specialAttName = :specialNameBind, 
                                                    specialAttReference = :specialRefBind, 
                                                    specialAttValue  = :specialValueBind
                                                    WHERE cardId = :cardIdBind;");
        } else {
            $dbQuerySpecial = $database->prepare("INSERT INTO specialAttribute (
                                                    specialAttName, 
                                                    specialAttReference,	
                                                    specialAttValue, 
                                                    cardId)
                                                  VALUES (
                                                    :specialNameBind,
                                                    :specialRefBind,
                                                    :specialValueBind,
                                                    :cardIdBind);");
        }

        $dbQueryCard->bindValue(':cardIdBind', $_GET['idForEdit']);
        $dbQuerySpecial->bindValue(':cardIdBind', $_GET['idForEdit']);
    } else {

        if (!file_exists($_FILES['cardImage']['tmp_name']) || !is_uploaded_file($_FILES['cardImage']['tmp_name'])) {
            // NOTA: substituir $targetDatabase por caminho de imagem padrão
            $targetDatabase = '';
            $queryParam = null;
            $queryField = null;
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/cardImage.php";
            $queryField = ', cardPhoto,';
            $queryParam = ', :cardPhotoBind,';
        }

        $dbQueryCard = $database->prepare("INSERT INTO card (
                                                       cardName, 
                                                       cardAtt1Value,	
                                                       cardAtt2Value, 
                                                       cardAtt3Value, 
                                                       cardAtt4Value
                                                       $queryField 
                                                       deckId)
                                            VALUES (
                                                       :cardNameBind,
                                                       :cardAtt1Bind,
                                                       :cardAtt2Bind,
                                                       :cardAtt3Bind,
                                                       :cardAtt4Bind
                                                       $queryParam
                                                       :deckIdBind);");

        $dbQuerySpecial = $database->prepare("INSERT INTO specialAttribute (
                                                       specialAttName, 
                                                       specialAttReference,	
                                                       specialAttValue, 
                                                       cardId)
                                            VALUES (
                                                       :specialNameBind,
                                                       :specialRefBind,
                                                       :specialValueBind,
                                                       @@IDENTITY);");

        $dbQueryCard->bindValue(':deckIdBind', $_GET['deckIdForEdit']);
    }

    $dbQueryCard->bindValue(':cardNameBind', $_POST['cardname']);
    $dbQueryCard->bindValue(':cardAtt1Bind', $_POST['attribute1']);
    $dbQueryCard->bindValue(':cardAtt2Bind', $_POST['attribute2']);
    $dbQueryCard->bindValue(':cardAtt3Bind', $_POST['attribute3']);
    $dbQueryCard->bindValue(':cardAtt4Bind', $_POST['attribute4']);
    if ($queryParam !== null) $dbQueryCard->bindValue(':cardPhotoBind', $targetDatabase);

    $dbQueryCard->execute();

    // NOTA: Adicionar mensagem de erro caso 1 dos 3 POSTS dos atributos especiais não esteja setado
    if (isset($_POST['specialAttributeName']) && isset($_POST['specialAttributeRef']) && isset($_POST['specialAttributeValue'])) {

        $dbQuerySpecial->bindValue(':specialNameBind', $_POST['specialAttributeName']);
        $dbQuerySpecial->bindValue(':specialRefBind', $_POST['specialAttributeRef']);
        $dbQuerySpecial->bindValue(':specialValueBind', $_POST['specialAttributeValue']);
        $dbQuerySpecial->execute();
    }
} else if (isset($_POST['action']) && $_POST['action'] === 'Excluir-carta' && isset($_GET['idForEdit'])) {

    $dbQuery = $database->prepare("DELETE FROM card WHERE cardId = :cardIdBind;");
    $dbQuery->bindValue(':cardIdBind', $_GET['idForEdit']);

    if ($dbQuery->execute()) {
        header('Location: /Mega-Triunfo/Projeto/public/html/create-card.php?deckIdForEdit=' . $_GET['deckIdForEdit']);
    }
}

// Seleciona a carta para edição
if (isset($_GET['idForEdit'])) {

    $dbQuery = $database->prepare("SELECT c.cardId, 
                                    c.cardName, 
                                    c.cardAtt1Value, 
                                    c.cardAtt2Value, 
                                    c.cardAtt3Value, 
                                    c.cardAtt4Value, 
                                    c.cardPhoto,
                                    s.specialAttName,
                                    s.specialAttReference,
                                    s.specialAttValue,
                                    COUNT (s.cardId) AS countSpecial
                                    FROM card AS c
                                    LEFT OUTER JOIN specialAttribute as s
                                    ON s.cardId = c.cardId WHERE c.cardId = :cardIdBind
                                    GROUP BY c.cardId,
                                             c.cardName, 
                                             c.cardAtt1Value, 
                                             c.cardAtt2Value, 
                                             c.cardAtt3Value, 
                                             c.cardAtt4Value, 
                                             c.cardPhoto,
                                             s.specialAttName,
                                             s.specialAttReference,
                                             s.specialAttValue");

    $dbQuery->bindValue(':cardIdBind', $_GET['idForEdit']);
    $dbQuery->execute();

    foreach ($dbQuery as $cardSelect) {

        $cardQuery[] = [
            'Id' => $cardSelect['cardId'],
            'Name' => $cardSelect['cardName'],
            'Attribute1' => $cardSelect['cardAtt1Value'],
            'Attribute2' => $cardSelect['cardAtt2Value'],
            'Attribute3' => $cardSelect['cardAtt3Value'],
            'Attribute4' => $cardSelect['cardAtt4Value'],
            'Photo' => $cardSelect['cardPhoto'],
            'Special Name' => $cardSelect['specialAttName'],
            'Special Ref' => $cardSelect['specialAttReference'],
            'Special Value' => $cardSelect['specialAttValue']
        ];

        $cardCount = $cardSelect['countSpecial'];
    };

    // Convertendo o Array PHP em um Array JavaScript
    $jsCardQuery = json_encode($cardQuery);
}
