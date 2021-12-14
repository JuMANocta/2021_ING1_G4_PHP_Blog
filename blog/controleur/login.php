<?php
include('../modele/connec.php');
include('../modele/crud.php');

if(isset($_POST['login']) && isset($_POST['password'])){
    login($base, $_POST['login'], $_POST['password']);
}else{
    header('Location: ../vue/login.php?erreur=erreur');
}
