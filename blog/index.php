<?php 
include('modele/connec.php');
include('modele/crud.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Pas un formulaire</title>
    <style>
        body { 
            background-color: beige;
        }
        h1 {
            text-align: center;
            width: 100%;
            /* border: 1px solid red; */
        }
        #formulaire{
            width: 100%;
            /* border: 1px solid red; */
        }
        .table{
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>BLOG ING 1</h1>
        <a href="/ING-1_2021/blog/vue/formulaire.php" id="formulaire" class="btn btn-dark btn-lg btn-block mx-auto" role="button">Ajouter un formulaire</a>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Date</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $rows = getContenus($base);
                foreach ($rows as $row) : ?>
                    <tr>
                        <th scope="row"><?= $row['titre']; ?></th>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['commentaire']; ?></td>
                        <td><img style="max-width: 200px;" src="/ING-1_2021/blog/res/images/<?= $row['photo']; ?>" alt="<?= $row['titre'] ?>"></td>
                        <td>
                            <a href="controleur/controlSuppression.php?id=<?= $row['id']; ?>&photo=<?= $row['photo']; ?>" class="btn btn-dark active" role="button" aria-pressed="true">🗑️</a>
                            <a href="vue/formulaire.php?id=<?= $row['id']; ?>" class="btn btn-dark active" role="button" aria-pressed="true">✏️</a>   
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>