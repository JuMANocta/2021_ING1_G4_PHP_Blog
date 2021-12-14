<?php
include('../modele/connec.php');
include('../modele/crud.php');

session_start();
if($_SESSION['admin'] != 'admin'){
    header('Location: ../index.php?erreur=noadmin');
}
$rows = getContenus($base);
?>
<div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id_user</th>
                    <th scope="col">Login</th>
                    <th scope="col">password</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $rows = getUsers($base);
                //var_dump($rows);
                foreach ($rows as $row) : ?>
                    <tr>
                        <th scope="row"><?= $row['id_user']; ?></th>
                        <td><?= $row['login']; ?></td>
                        <td><?= $row['password']; ?></td>
                        <td><a href="../controleur/controlSuppression.php?id_user=<?= $row['id_user']; ?>" class="btn btn-dark active" role="button" aria-pressed="true">🗑️</a></td>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>