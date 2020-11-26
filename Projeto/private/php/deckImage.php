<?php

// --- INSERÇÃO DA IMAGEM --- A imagem vai assumir o nome do seu baralho
    $deckCoverName = $_POST['name'];
    // Pegando o tipo da imagem
    $fileExtension = explode('/', $_FILES['deckImage']['type']);
    $imageType = $fileExtension[1];

    // Especifica pra onde a imagem vai ser movida
    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . '/Mega-Triunfo/Projeto/public/html/images/decks/';
    // Especifica o caminho completo do upload
    $targetFile = "{$targetDirectory}{$deckCoverName}.$imageType";
    $targetDatabase = "images/decks/{$deckCoverName}.$imageType";
    // Variável pra controle de upload
    $uploadOK = 1;
    // Vai checar se o arquivo realmente é uma imagem
    $check = getimagesize($_FILES['deckImage']['tmp_name']);

    if ($check) {
        //echo 'O arquivo é uma imagem - ' . $check['mime'] . '.';
    } else {
        //echo 'O arquivo não é uma imagem.';
        $uploadOK = 0;
    }

    // Checando se a imagem já existe na pasta destino e substituindo-a, independente de sua extensão de arquivo
    $arrayTypes = [
        0 => '.jpg',
        1 => '.jpeg',
        2 => '.png'];
    
    foreach ($arrayTypes as $reg) {
        if (file_exists($targetDirectory.$deckCoverName.$reg)) unlink($targetDirectory.$deckCoverName.$reg);
    }

    // Checando se o tamanho está dentro do permitido
    if ($_FILES['deckImage']['size'] > 5000000) {
        $uploadOK = 0;
    }

    // Checando se a imagem está num formato permitido
    if ($imageType != 'jpg' && $imageType != 'png' && $imageType != 'jpeg') {
        echo 'Desculpe, só são aceitos os formatos JPG, JPEG e PNG.';
        $uploadOK = 0;
    }

    /* $imageSize = getimagesize($_FILES['deckImage']['tmp_name']);

    if ($imageSize['width'] < 200 || $imageSize['height'] < 250) {
        $uploadOK = 0;
    } */

    //var_dump($uploadOK);
    // Checando se a imagem passou em todas as etapas anteriores
    if ($uploadOK === 0) {
        echo 'Desculpe, seu arquivo não foi carregado.';
    } else {
        // Se tudo estiver certo, ele vai mover o arquivo para o local indicado
        if (move_uploaded_file($_FILES['deckImage']['tmp_name'], $targetFile)) {
            //echo 'O arquivo ' . htmlspecialchars(basename($_FILES['deckImage']['name'])) . ' foi carregado.';
        } else {
            echo 'Desculpe, houve um erro ao carregar seu arquivo.';
        }
    }