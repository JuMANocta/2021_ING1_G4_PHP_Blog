<?php
include('../modele/connec.php');
include('../modele/crud.php');

$nbRowDel = suppression($base, $_GET['id']);
$photoDel = unlink("../res/images/".$_GET['photo']); //! bool

header('Location: ../index.php');