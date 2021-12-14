<?php
include('../modele/connec.php');
include('../modele/crud.php');
if (isset($_GET['id'])) {
    $nbRowDel = suppression($base, $_GET['id']);
    $photoDel = unlink("../res/images/" . $_GET['photo']); //! bool
}
if(isset($_GET['id_user'])) {
    $nbRowDel = suppressionUser($base, $_GET['id_user']);
}
header('Location: ../index.php');
