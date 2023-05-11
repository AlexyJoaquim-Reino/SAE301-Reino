<?php include '../database/data.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <?php include('head.php'); ?>

</head>

<body>
 <center> <h2 class="mt-5 mb-2">Ajouter un utilisateur</h2> </center>
    <?php

    if ($_SESSION['admin'] == 1) {
        echo '
        <form action="register_utilisateur" method="post">
    
        <div class="mb-3 container d-flex flex-column justify-content-center align-items-center w-25 mb-5 mt-5">
           
            <label class="form-label" for="nom">Nom et prénoms*</label>
            <input class="form-control" required type="text" name="nom">
            <label class="form-label" for="login">Nom d\'utilisateur*</label>
            <input class="form-control" required type="text" name="login">
            <label class="form-label" for="mail">Adresse email*</label>
            <input class="form-control" required type="text" name="mail">
            <label class="form-label" for="mdp">Mot de passe*</label>
            <input class="form-control" required type="password" name="mdp">  
            <label class="form-label" for="bio">Bio</label>
            <textarea name="bio" id="" cols="30" rows="10"></textarea>
           
            <fieldset>
                <legend>Permissions</legend>
                <label class="form-check-label" for="role_projets">Projets</label> 
                <input class="form-check-input" type="checkbox" name="role_projets" id="" value=1><br>
                <label class="form-check-label" for="role_articles">Articles</label>
                <input class="form-check-input" type="checkbox" name="role_articles" id="" value=1><br>
                <label class="form-check-label" for="role_admin">Administration</label>
                <input class="form-check-input" type="checkbox" name="role_admin" id="" value=1><br>
            </fieldset>
            <input class="btn btn-primary my-4" type="submit" value="Enregistrer">
            </div>
        </form>';
    }

    if ($_SESSION['admin'] == 1) {
        echo '<div class="w-75 m-auto"><h2 class="mt-5 mb-2 text-center">Les utilisateurs</h2>';
        if ($_SESSION['admin'] == 1) {
            echo '<table class="table table-bordered table-striped px-5 ">';
            foreach (getUsers() as $user) {
                echo "
        <tr>
            <th>{$user['nom']}</th><th><a href='page_modifier_utilisateur?id={$user['id']}'>Modifier</a></th>
        </tr>";
            }
            echo '</table></div>';
        }
        /* La balise th permet de bien séparer chaque catégorie que l'on souhaite intégrer */
    } else {
        echo '<p class="text-center">Vous ne pouvez pas modifier ou supprimer cette catégorie. Pour cela adressez-vous à l\'administrateur pour qu\'il vous donne accès.</p>';
    }

    ?>
</body>

</html>