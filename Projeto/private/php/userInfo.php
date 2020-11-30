<?php
chdir(__DIR__);
// require_once 'sessionStart.php';
session_start();
require_once './database/db.php';



$queryUser = $database->query("SELECT userName, userEmail, userLevel FROM userLogin WHERE userEmail = 'arthur@gmail.com'");

$queryUser->bindValue(':loginBind', $_SESSION['login']);
$data = $queryUser->fetch(PDO::FETCH_ASSOC);

$userLevel = $data['userLevel'] === "1" || $data['userLevel'] === NULL ? 'Administrador' : 'Usuário';

$queryUser->execute();


include $_SERVER['DOCUMENT_ROOT'] . "/Mega-Triunfo/Projeto/public/html/profile.php";

?>