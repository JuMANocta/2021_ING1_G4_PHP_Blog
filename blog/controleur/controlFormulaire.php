<?php
include('../modele/connec.php');
include('../modele/crud.php');
define("BR", "</br>");
/*
foreach($_POST as $key => $valeur){
        echo $key." ".$valeur.BR;    
}
foreach($_FILES as $retour){
    foreach($retour as $key => $valeur){
        echo $key." ".$valeur.BR;
    }
}
$_POST
title test
comment lorem
$_FILES
name Sans titre.jpg
type image/jpeg
tmp_name C:\xampp\tmp\php6C9.tmp
error 0
size 35251
*/
//? Testons la récupération du fichier
if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
    //? Testons la taille du fichier
    if($_FILES['photo']['size'] <= 3145728){
        //? testons si l'extention est autorisée
        $infosFichier = pathinfo($_FILES['photo']['name']);
        $extensionUpload = strtolower($infosFichier['extension']);
        $extensionAutorisees = array('jpg','jpeg','gif','png','webp');
        //? testons si notre fichier a bien les extentions autorisées
        if(in_array($extensionUpload,$extensionAutorisees)){
            //? on peut valider l'enregistrement du fichier photo
            $moveUpload = move_uploaded_file(
                $_FILES['photo']['tmp_name'],'..//res//images//'
                .basename($_FILES['photo']['name']));
                if($moveUpload){
                    echo "L'envoi a bien été effectué 💯💯💯";
                }else{echo "L'envoi a bien 💩💩💩";}
        }else{echo "😵 extension non autorisée 😵";}
    }else{echo "🦏 image trop volumineuse 🦏";}
}else{echo "☠️ problème à l'envoi ☠️";}
echo BR;
//? injecter les informations dans la BDD
var_dump($_POST);
if(isset($_POST['id']) && !empty($_POST['id'])){
    updateContenus($base,[$_POST['id'],$_POST['title'],date('Y-m-d H:i:s'),$_POST['comment'],$_FILES['photo']['name']]);
}else{
    $lastInsert = createContenus($base,[$_POST['title'],date('Y-m-d H:i:s'),$_POST['comment'],$_FILES['photo']['name'], $_POST['id_user']]);
}
echo $lastInsert;

header('Location: ../index.php');