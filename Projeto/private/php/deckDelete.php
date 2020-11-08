<?php 

require 'C:/xampp/htdocs/Reposit_GIT/Mega-Triunfo/Projeto/private/php/database/db.php';

$dbQuery = $database->prepare("DELETE FROM deck WHERE deckId = :deckIdBind;");
$dbQuery->bindValue(':deckIdBind', $_GET['idForEdit']);

if ($dbQuery->execute()) {
    header('Location: http://localhost/Reposit_GIT/Mega-Triunfo/Projeto/public/html/create-deck.php');
}

// Redirecionando para a criação/edição de outro baralho
