<?php

require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/database/db.php";

//Se o método GET[idForEdit] estiver setado, ele fará um UPDATE conforme o ID passado, caso contrário fara um INSERT
if (isset($_GET['idForEdit'])) {

    include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/deckImage.php";

    $dbQuery = $database->prepare("UPDATE deck SET
                                           deckName = :deckNameBind,
                                           deckAtt1Name = :deckAtt1NameBind,
                                           deckAtt2Name = :deckAtt2NameBind,
                                           deckAtt3Name = :deckAtt3NameBind,
                                           deckAtt4Name = :deckAtt4NameBind,
                                           deckPhoto = :deckPhotoBind,
                                           WHERE deckId = :deckIdBind;");

    $dbQuery->bindValue(':deckIdBind', $_GET['idForEdit']);

} else {

    include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/deckImage.php";

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
$dbQuery->bindValue(':deckPhotoBind', $targetDatabase);

$dbQuery->execute();
