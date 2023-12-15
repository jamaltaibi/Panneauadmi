<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="admi">
        <h1>Panneau d'administration</h1>
        <ul>
            <a href="?page=accueil"> <li>Accueil</li> </a>
            <a href="?page=utilisateurs"> <li>Utilisateurs</li> </a>
            <a href="?page=paramètres"> <li>Paramètres</li> </a>
            <a href="?page=connexion"> <li>Connexion</li> </a>
        </ul>
        <label for="">nom</label>
        <form action="">
            <input type="text" id="name" name="user_name" />
        </form>
        <label for="">Prenom</label>
        <form action="">
            <input type="text" id="name" name="user_name" />
        </form>
        <form action="">
            <input type="submit" value = "Se connecter">
        </form>
    </div>

    <?php

    ?>
    
</body>
</html>