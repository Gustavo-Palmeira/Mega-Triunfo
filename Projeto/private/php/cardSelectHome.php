<?php
// SELEÇÃO DE INFORMAÇÕES DE TODOS OS CARDS PARA MOSTRAR NA TABELA
require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/database/db.php";

$dbQuery = $database->prepare('SELECT c.cardId, 
                                    c.cardName, 
                                    c.cardAtt1Value, 
                                    c.cardAtt2Value, 
                                    c.cardAtt3Value, 
                                    c.cardAtt4Value, 
                                    c.cardPhoto,
                                    s.specialAttValue,
                                    s.specialAttName
                                    FROM card AS c
                                    INNER JOIN deck AS d 
                                    ON c.deckId = :deckIdBind
                                    INNER JOIN specialAttribute as s
                                    ON s.cardId = c.cardId;');

$dbQuery->bindValue(':deckIdBind', $_GET['deckId']);
$dbQuery->execute();

$cardTable = array();

foreach ($dbQuery as $cardSelect) {
    $cardTable[$cardSelect['cardId']] = [
        'Id' => $cardSelect['cardId'],
        'Name' => $cardSelect['cardName'],
        'Attribute1' => $cardSelect['cardAtt1Value'],
        'Attribute2' => $cardSelect['cardAtt2Value'],
        'Attribute3' => $cardSelect['cardAtt3Value'],
        'Attribute4' => $cardSelect['cardAtt4Value'],
        'Photo' => $cardSelect['cardPhoto'],
        'SpecialAtt' =>$cardSelect['specialAttValue'],
        'SpecialAttName' =>$cardSelect['specialAttName']
    ];
};

if($cardTable) {
if (count($cardTable) > 0) {
    foreach ($cardTable as $register) {
        echo "<tr>
                <td>{$register['Name']}</td>
                <td>{$register['SpecialAttName']}</td> 
                <td>{$register['SpecialAtt']}</td>              
                ";
    }
} else {
    echo "<tr>
                <td colspan='3'>Não há cartas cadastradas!</td>
                </tr>";
}
}