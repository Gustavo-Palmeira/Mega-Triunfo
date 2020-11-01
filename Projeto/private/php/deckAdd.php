<?php

require 'C:/xampp/htdocs/Reposit_GIT/megaTriunfo/Projeto/private/php/database/db.php';

$dbQuery = $database->prepare("INSERT INTO deck (
                                           deckName, 
                                           deckAtt1Name, 
                                           deckAtt2Name, 
                                           deckAtt3Name, 
                                           deckAtt4Name,
                                           deckPhoto)

                                VALUES (  :deckName,
                                          :deckAtt1NameBind,
                                          :deckAtt2NameBind,
                                          :deckAtt3NameBind,
                                          :deckAtt4NameBind,
                                          CAST (:deckPhotoBind AS VARBINARY));");

$dbQuery->bindValue(':deckName',$_POST['name']); 
$dbQuery->bindValue(':deckAtt1NameBind',$_POST['attribute1']); 
$dbQuery->bindValue(':deckAtt2NameBind',$_POST['attribute2']); 
$dbQuery->bindValue(':deckAtt3NameBind',$_POST['attribute3']);
$dbQuery->bindValue(':deckAtt4NameBind',$_POST['attribute4']);
$dbQuery->bindValue(':deckPhotoBind',$_POST['photo']);

$dbQuery->execute();