<?php
function getContenus($base){
    $select = "SELECT * FROM contenu;";
    $stmt = $base->prepare($select);
    $stmt->execute([]);
    return $stmt->fetchAll();
}
function getUsers($base){
    $select = "SELECT * FROM users;";
    $stmt = $base->prepare($select);
    $stmt->execute([]);
    return $stmt->fetchAll();
}
function getContenusUpdate($base,$id){
    $select = "SELECT * FROM contenu WHERE id LIKE $id";
    $stmt = $base->prepare($select);
    $stmt->execute([]);
    return $stmt->fetchAll();
}
function createContenus($base,$args){
    // Requête SQL pour ajouter des informations
    $insert = "INSERT INTO contenu (titre, date, commentaire, photo, id_user) VALUES (:titre,:date,:commentaire,:photo, :id_user)";
    // initialisation de la requête
    $stmt = $base->prepare($insert);
    var_dump($args);
    // [0]=>string(5) "photo"
    // [1]=>string(19) "2021-11-10 09:50:52"
    // [2]=>string(19) "je suis commentaire"
    // [3]=>string(23) "icons8-upward-arrow.gif"
    var_dump($args);
    // le contrôle des paramètres de la requête
    $stmt->bindParam(":titre",htmlspecialchars($args[0]));
    $stmt->bindParam(":date",$args[1]);
    $stmt->bindParam(":commentaire",htmlspecialchars($args[2]));
    $stmt->bindParam(":photo",$args[3]);
    $stmt->bindParam(":id_user",$args[4]);
    // exécution de la requête
    $stmt->execute();
    return $base->lastInsertId();
}
function suppression($base, $id){
    $delete = "DELETE FROM contenu WHERE id = '$id'";
    $stmt = $base->prepare($delete);
    $stmt->execute([]);
    return $stmt->rowCount();
}
function suppressionUser($base, $id){
    $delete = "DELETE FROM users WHERE id_user = '$id'";
    $stmt = $base->prepare($delete);
    $stmt->execute([]);
    return $stmt->rowCount();
}
function updateContenus($base, $args){
    $update = "UPDATE contenu SET titre = :titre, date = :date, commentaire = :commentaire, photo = :photo WHERE id = '".$args[0]."'";
    $stmt = $base->prepare($update);
    $stmt->bindParam(":titre",$args[1]);
    $stmt->bindParam(":date",$args[2]);
    $stmt->bindParam(":commentaire",$args[3]);
    $stmt->bindParam(":photo",$args[4]);
    $stmt->execute();
}
function login($base, $user_login, $user_password, $remember=false){
    $user_password = sha1($user_password);
    $query = $base->prepare("SELECT id_user, login, password FROM users WHERE login = :login");
    $query->bindValue(':login', $user_login);
    $query->execute();

    if($query->rowCount() > 0) {
        $user = $query->Fetch(PDO::FETCH_OBJ);
        if($user->password == $user_password) {
            session_start();
            $_SESSION['loggd_id'] = $user->id_user;
            $_SESSION['admin'] = $user->login;
            if($remember == true) {
                setcookie('lggd_sess', hash('sha512', uniqid()), 84600);
            }
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../vue/login.php?erreur=connexion');
    }
}
function deco(){
    session_destroy();
    header('location: ../vue/login.php?deco=deco');
}