<?php

// SELEÇÃO DE INFORMAÇÕES DE TODOS OS DECKS PARA MOSTRAR NA TABELA
require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/database/db.php";

$dbQuery = $database->query('SELECT d.deckId, 
                                    d.deckName, 
                                    d.deckAtt1Name, 
                                    d.deckAtt2Name, 
                                    d.deckAtt3Name, 
                                    d.deckAtt4Name, 
                                    d.deckPhoto,
                                    COUNT(c.cardId) AS contCard
                                    FROM deck AS d 
                                    LEFT OUTER JOIN 
                                    card AS c ON 
                                    c.deckId = d.deckId
                                    GROUP BY d.deckId, 
                                             d.deckName, 
                                             d.deckAtt1Name, 
                                             d.deckAtt2Name, 
                                             d.deckAtt3Name, 
                                             d.deckAtt4Name, 
                                             d.deckPhoto');

$deckTable = array();

foreach ($dbQuery as $deckSelect) {
    $deckTable[$deckSelect['deckId']] = [
        'Id' => $deckSelect['deckId'],
        'Name' => $deckSelect['deckName'],
        'Attribute1' => $deckSelect['deckAtt1Name'],
        'Attribute2' => $deckSelect['deckAtt2Name'],
        'Attribute3' => $deckSelect['deckAtt3Name'],
        'Attribute4' => $deckSelect['deckAtt4Name'],
        'Photo' => $deckSelect['deckPhoto'],
        'ContCard' => $deckSelect['contCard'],
    ];
};

if($deckTable) {
if (count($deckTable) > 0) {
    foreach ($deckTable as $register) {
        echo "<tr>
                <td>{$register['Name']}</td>
                <td>{$register['ContCard']}</td>
                <td><i class='far fa-edit editIcon' name='{$register['Id']}' style='cursor: pointer;'></i></td>                    
                ";
    }
} else {
    echo "<tr>
                <td colspan='3'>Não há baralhos cadastrados</td>
                </tr>";
}
}