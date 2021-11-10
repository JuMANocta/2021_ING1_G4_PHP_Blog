<?php
$host_serveur = 'mysql:host=localhost';
$bdd = ';dbname=blog';
$login = 'www_ing1';
$pass = 'www_ing1';
try{
    $base = new PDO($host_serveur.$bdd, $login, $pass);
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo "Le serveur n'est pas disponible...";
    die("Erreur:".$e->getMessage());
}

