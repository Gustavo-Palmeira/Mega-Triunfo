<?php

require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/database/db.php";


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
                                    s.specialAttValue 
                                    FROM card AS c
                                    LEFT OUTER JOIN specialAttribute as s
                                    ON s.cardId = c.cardId WHERE c.cardId = :cardIdBind");

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
    };

    // Convertendo o Array PHP em um Array JavaScript
    $jsCardQuery = json_encode($cardQuery);
}