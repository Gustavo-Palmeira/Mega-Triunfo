<?php

require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/database/db.php";

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
