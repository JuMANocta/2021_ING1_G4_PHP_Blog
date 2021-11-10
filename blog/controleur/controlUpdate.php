<?php
include('../modele/connec.php');
include('../modele/crud.php');

// récupération des informations du formulaire
$args = [$_POST['id'],$_POST['title'],date('Y-m-d H:i:s'),$_POST['comment'],$_FILES['photo']['name']];
// exécution de la requête de modification
$lastUpdate = updateContenus($base, $args);

header('Location: ../index.php');