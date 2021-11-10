<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Formulaire</title>
    <style>
        body { 
            background-color: beige;
        }
        h1{
            width: 100%;
            height: 200%;
            text-align: center;
            background: linear-gradient(115deg,#4fcf70,#fad648,#a767e5,#12bcfe,#44ce7b);
            background-size: 50% 100%;
            border-radius: 6px;
            color: whitesmoke;
            margin-top: 5px;
            padding: 5px;
        }
    </style>
</head>
<?php
include("../modele/connec.php");
include("../modele/crud.php");
if(isset($_GET['id'])){
    $url = "../controleur/controlUpdate.php";
    $recupInfo = getContenusUpdate($base,$_GET['id']);
    // ["id"]=>string(1) "4"
    // ["titre"]=>string(5) "test2"
    // ["date"]=>string(19) "2021-11-10 11:00:35"
    // ["commentaire"]=>string(49) "essai"
    // ["photo"]=>string(23) "icons8-upward-arrow.gif"
}else{
    $url = "../controleur/controlFormulaire.php";
}
?>
<body>
<div class="container">
    <h1><?= (isset($_GET['id']) ? "Modifier" : "Ajouter") ?> un post</h1>
    <hr>
    <form action="<?= $url?>" method="POST" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="id" value="<?= (isset($_GET['id']) ? $recupInfo[0]["id"] : "") ?>">
            <input class="form-control" type="text" placeholder="Titre" name="title" value="<?= (isset($_GET['id']) ? $recupInfo[0]["titre"] : "") ?>" required>
        </div>
        <hr>
        <div>
            <textarea placeholder="Commentaire" class="form-control" name="comment" id="comment" cols="30" rows="10" required><?= (isset($_GET['id']) ? $recupInfo[0]["commentaire"] : "") ?></textarea>
        </div>
        <hr>
        <div>
            <input class="form-control" type="file" name="photo" required>
        </div>
        <hr>
        <div>
            <input class="form-control btn-outline-info" type="submit" value="Envoyer">
        </div>
    </form>
</div>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
</script>
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous">
</script>
</body>
</html>