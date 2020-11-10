<?php 

require $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/private/php/database/db.php";

$dbQuery = $database->prepare("DELETE FROM deck WHERE deckId = :deckIdBind;");
$dbQuery->bindValue(':deckIdBind', $_GET['idForEdit']);

if ($dbQuery->execute()) {
    header('Location: /Mega-Triunfo/Projeto/public/html/create-deck.php');
}

// Redirecionando para a criação/edição de outro baralho
