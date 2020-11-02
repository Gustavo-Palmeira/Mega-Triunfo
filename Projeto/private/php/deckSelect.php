<?php

require 'C:/xampp/htdocs/Reposit_GIT/Mega-Triunfo/Projeto/private/php/database/db.php';

$dbQuery = $database->query('SELECT deckId, 
                                    deckName, 
                                    deckAtt1Name, 
                                    deckAtt2Name, 
                                    deckAtt3Name, 
                                    deckAtt4Name, 
                                    deckPhoto 
                                    FROM deck ORDER BY deckName');


foreach ($dbQuery as $deckSelect) {
    $deckTable[$deckSelect['deckId']] = [
        'Id' => $deckSelect['deckId'],
        'Name' => $deckSelect['deckName'],
        'Attribute1' => $deckSelect['deckAtt1Name'],
        'Attribute2' => $deckSelect['deckAtt2Name'],
        'Attribute3' => $deckSelect['deckAtt3Name'],
        'Attribute4' => $deckSelect['deckAtt4Name'],
        'Photo' => $deckSelect['deckPhoto']
    ];
};

if (count($deckTable) > 0) {
    foreach ($deckTable as $register) {
        echo "<tr>
                <td>{$register['Name']}</td>
                <td>23</td>
                <td><i class='far fa-edit editIcon' name='{$register['Id']}' style='cursor: pointer;'></i></td>                    
                ";
    }
} else {
    echo "<tr>
                <td colspan='3'>Não há baralhos cadastrados</td>
                </tr>";
}
