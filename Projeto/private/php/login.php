<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

session_start();

require_once "database/db.php";

//var_dump(isset($_POST['startLogin']));

/* $pass = password_hash('admin', PASSWORD_DEFAULT);
$database->query("INSERT INTO userLogin (userEmail, userPassword) VALUES ('gustavo@senac.com.br', '$pass')"); */

if (isset($_POST['startLogin'])) {


  $login = filter_var($_POST['userLoginIndex'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['passwordLoginIndex'];

  // Verificar se existe usuário
  $bdquery = $database->query("SELECT userPassword FROM userLogin WHERE userEmail = '$login' ");
  $record = $bdquery->fetch(PDO::FETCH_ASSOC);
  $hash = $record['userPassword'];

  // Comparar
  if (password_verify($password, $hash)) {

    $_SESSION['login'] = $login;
    include($_SERVER['DOCUMENT_ROOT'] . '/Mega-Triunfo/Projeto/public/html/partials/privateHead.php');

    // QUANDO EU CHAMO O CREATE_DECK DÁ ERRADO, O CREATE CARD DÁ CERTO
    include($_SERVER['DOCUMENT_ROOT'] . '/Mega-Triunfo/Projeto/public/html/create-card.php');

  } else {
    header('Location: ../../index.php?msg=Credenciais inválidas');
  }
} else {

  $msg = "Erro";
  header('Location: ../../index.php');
}