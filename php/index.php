<?php
ob_start();

session_start();
$_SESSION["ident"] = "jamal";
$_SESSION["mdp"] = "jam123";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <h1>Panneau d'administration</h1>
    <ul>
        <a href="?page=accueil"> <li>Accueil</li> </a>
        <a href="?page=utilisateurs"> <li>Utilisateurs</li> </a>
        <a href="?page=paramètres"> <li>Paramètres</li> </a>
        <?php 
            if (!isset ($_SESSION ['connexionok']) || $_SESSION ['connexionok'] == false ){
                echo'<a href="?page=connexion"> <li>Connexion</li> </a>';} 
            if (isset ($_SESSION ['connexionok']) && $_SESSION ['connexionok'] == true){
                echo '<a href="?page=deconnexion"> <li>Deconnexion</li> </a>';  
                } ?>
    </ul>
    <?php
        if (isset ($_GET ['page']) && $_GET['page'] == 'connexion'){
            echo '    
                    <form method="POST">
                        <label for="">Identifiant</label> <br>
                        <input type="text" id="ident" name="ident"/> <br>
                        <label for="">Mot de Passe</label> <br>
                        <input type="password" id="mdp" name="mdp"/> <br>
                        <input type="submit" value = "Se connecter">
                    </form>';
            if (isset($_POST["ident"]) && isset($_POST["mdp"])) {
                if ($_POST["ident"] == $_SESSION["ident"] && $_POST["mdp"] == $_SESSION["mdp"])
                {
                $_SESSION["connexionok"] = true;
                header("Location: ?page=accueil"); 
                exit();
            }
             else { 
                $_SESSION["connexionok"] = false;
                }
            };
            if (isset ($_SESSION ['connexionok']) && $_SESSION['connexionok'] == false){
                echo"<h3 class='pasco'> Identifiant ou mot de passe incorect </h3>";
            }
            if (isset ($_SESSION ['connexionok']) && $_SESSION['connexionok'] == true){
                echo' Welcome Jamal';
            }
        }

        elseif (isset ($_GET ['page']) && $_GET['page'] == 'accueil'){
            if (!isset ($_SESSION ['connexionok']) || $_SESSION ['connexionok'] == false){
                echo"<h3 class='pasco'> Vous devez être connecté pour avoir accès.</h3>";
            } else {
                echo"Welcome dans l'accueil";
            }
        }

        elseif (isset ($_GET ['page']) && $_GET['page'] == 'utilisateurs'){
            if (!isset ($_SESSION ['connexionok']) || $_SESSION ['connexionok'] == false) {
                echo "<h3 class='pasco'> Vous devez être connecté pour avoir accès.</h3>";
            } else {
                echo "Bienvenue,<br>";
                echo '<h2 class="modif">Vos informations utilisateur</h2>';
                echo 'Nom : '. (isset($_SESSION["Nom"]) ? $_SESSION["Nom"] : '') . '<br>';
                echo 'Prénom : ' . (isset($_SESSION["Prénom"]) ? $_SESSION["Prénom"] : '') . '<br>';
                echo 'Age : ' . (isset($_SESSION["Age"]) ? $_SESSION["Age"] : '') . ' ans <br>';
                echo 'Role : ' . (isset($_SESSION["role"]) ? $_SESSION["role"] : '');
            }
        }  

        elseif (isset($_GET['page']) && $_GET['page'] == 'paramètres') {
            if (!isset ($_SESSION ['connexionok']) || $_SESSION ['connexionok'] == false) {
                echo "<h3 class='pasco'> Vous devez être connecté pour avoir accès.</h3>";
            } else {
                echo '<h2 class="modif"> Modification de vos paramètres </h2>';
                echo '
                <form class="para" method="POST">
                <label for="">Nom</label> 
                <input type="text" id="Nom" name="Nom" value=" "/> 
                <label for="">Prénom</label> 
                <input type="text" id="Prénom" name="Prénom" value=""/> 
                <label for="">Age</label>
                <input type="number" id="" name="Age" value="">
                <label for="">Rôle</label>
                <input type="text" name="role" id="role" value="">
                <input type="submit" name="modif" value="Modifier">
            </form>';


                if (isset($_POST['modif'])) {
                    $_SESSION["Nom"] = $_POST["Nom"];
                    $_SESSION["Prénom"] = $_POST["Prénom"];
                    $_SESSION["Age"] = $_POST["Age"];
                    $_SESSION["role"] = $_POST["role"];
                }
            }
        }
        if (isset ($_GET ['page']) && $_GET['page'] == 'deconnexion'){      
            session_destroy();
        }     
    ?>
</body>
</html>
<?php
ob_end_flush(); 
?>