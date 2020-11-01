<?php

require_once 'config.php';

try {

    $database = new PDO($dsn, $user, $password);
    
    } catch (PDOException $error) {
    
    echo 'Connection failed: ' . $error->getMessage();
    
    }