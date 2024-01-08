<?php
ob_start();

session_start();
$_SESSION["ident"] = "jamal";
$_SESSION["mdp"] = "jam";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <h2 class="titre">Panneau d'administration </h1>
        <ul>
            <a href="?page=accueil"> <li>Accueil</li> </a>
            <a href="?page=utilisateurs"> <li>Utilisateurs</li> </a>
            <a href="?page=paramètres"> <li>Paramètres</li> </a>
            <?php 
                if (!isset ($_SESSION ['connexionok']) || $_SESSION ['connexionok'] == false ){
                    echo'<a href="?page=connexion"> <li>Connexion</li> </a>';
                } 
                if (isset ($_SESSION ['connexionok']) && $_SESSION ['connexionok'] == true){
                    echo '<a href="?page=deconnexion"> <li>Deconnexion</li> </a>';  
                } 
            ?>
        </ul>
    </div> 
    
    <?php
//accueil//

        if (isset ($_GET ['page']) && $_GET['page'] == 'accueil'){  

            if (isset ($_SESSION ['connexionok']) && $_SESSION['connexionok'] == true){
                echo' Welcome '.$_SESSION["Nom"].' '.$_SESSION["Prénom"] ;
                echo "<h3 class='co'> Vous êtes connecté.</h3>";     
            }

            if (!isset ($_SESSION ['connexionok']) || $_SESSION['connexionok']== false){
                echo'<div class="formconect">
                        <form method="POST">
                            <label for="">Identifiant</label> <br>
                            <input type="text" id="ident" name="ident"> <br>
                            <label for="">Mot de Passe</label> <br>
                            <input type="password" id="mdp" name="mdp"> <br>
                            <input class="btn" type="submit" name="submit" value = "Se connecter">
                        </form>
                <div/>';
            }

            if (isset($_POST["ident"]) && isset($_POST["mdp"])){
                if ($_POST["ident"] == $_SESSION["ident"] && $_POST["mdp"] == $_SESSION["mdp"]){

                    $_SESSION["connexionok"] = true;
                    $_SESSION["Nom"] = "Taibi"; 
                    $_SESSION["Prénom"] = "Jamal";
                    $_SESSION["Age"] = 32;
                    $_SESSION["role"] = "Etudiant"; 
                    header("Location: ?page=accueil");
                    exit();   
                }
             else { 
                    $_SESSION["connexionok"] = false;
                    echo"<h3 class='pasco'> Identifiant ou mot de passe incorect </h3>";
                }
            };
        }

//utilisateur//

        if (isset ($_GET ['page']) && $_GET['page'] == 'utilisateurs'){

            if (isset ($_SESSION ['connexionok']) && $_SESSION['connexionok'] == true){
                echo' Welcome '.$_SESSION["Nom"].' '.$_SESSION["Prénom"] ;
            }

            if (!isset ($_SESSION ['connexionok']) || $_SESSION['connexionok']== false){
                echo'<div class="formconect">
                        <form method="POST">
                            <label class="ide" for="">Identifiant</label> <br>
                            <input type="text" id="ident" name="ident"> <br>
                            <label class="ide" for="">Mot de Passe</label> <br>
                            <input type="password" id="mdp" name="mdp"> <br>
                            <input class="btn" type="submit" name="submit" value = "Se connecter">
                        </form>
                    <div/>';
            }

            if (isset($_POST["ident"]) && isset($_POST["mdp"])){
                if ($_POST["ident"] == $_SESSION["ident"] && $_POST["mdp"] == $_SESSION["mdp"]){

                    $_SESSION["connexionok"] = true;
                    $_SESSION["Nom"] = "Taibi"; 
                    $_SESSION["Prénom"] = "Jamal";
                    $_SESSION["Age"] = 32;
                    $_SESSION["role"] = "Etudiant";
                    header("Location: ?page=accueil");
                    exit();  
                }
             else { 
                    $_SESSION["connexionok"] = false;
                    echo"<h3 class='pasco'> Identifiant ou mot de passe incorect </h3>";
                }
            }

            elseif(isset ($_GET ['page']) && $_GET['page'] == 'utilisateurs'){

                if (!isset ($_SESSION ['connexionok']) || $_SESSION ['connexionok'] == false){
                    echo "<h3 class='avertco'> Vous devez être connecté pour avoir accès.</h3>";
                }else{
                    echo '<h2 class="modif">Vos informations utilisateur</h2>';
                    echo '<p class="utile"> Nom : '.(isset($_SESSION["Nom"]) ? $_SESSION["Nom"] : '') . '</p>';
                    echo '<p class="utile"> Prénom : ' . (isset($_SESSION["Prénom"]) ? $_SESSION["Prénom"] : '') . '</p>';
                    echo '<p class="utile"> Age : ' . (isset($_SESSION["Age"]) ? $_SESSION["Age"] : '') .' ans' .'</p>';
                    echo '<p class="utile"> Rôle : ' . (isset($_SESSION["role"]) ? $_SESSION["role"] : '').'</p>';
                }
            }
        }

//parametre//

        if (isset($_GET['page']) && $_GET['page'] == 'paramètres') {
           
            $afficherFormulaire = true;
            function genererFormulaire() {
                $formulaire = '<form class="para" method="POST">
                                   <label for="">Nom :</label> 
                                   <input type="text" id="" name="Nom" value="'. (isset($_SESSION["Nom"]) ? $_SESSION["Nom"] : '') . '"/> 
                                   <label for="">Prénom :</label> 
                                   <input type="text" id="Prénom" name="Prénom" value="' . (isset($_SESSION["Prénom"]) ? $_SESSION["Prénom"] : '') . '"/> 
                                   <label for="">Age :</label>
                                   <input type="number" id="" name="Age" value="' . (isset($_SESSION["Age"]) ? $_SESSION["Age"] : '') .'">
                                   <label for="">Rôle :</label>
                                   <input type="text" name="role" id="role" value="' . (isset($_SESSION["role"]) ? $_SESSION["role"] : '') . '">
                                   <input class="btn"  type="submit" name="modif" value="Modifier">
                               </form>';
                return $formulaire;
            }

            if (isset ($_SESSION ['connexionok']) && $_SESSION['connexionok'] == true){
                echo' Welcome '.$_SESSION["Nom"].' '.$_SESSION["Prénom"] ;
            }
            else{
                echo'<div class="formconect">
                <form method="POST">
                    <label for="">Identifiant</label> <br>
                    <input type="text" id="ident" name="ident"> <br>
                    <label for="">Mot de Passe</label> <br>
                    <input type="password" id="mdp" name="mdp"> <br>
                    <input class="btn" type="submit" name="submit" value = "Se connecter">
                </form>
            <div/>';
            }
        
            if (isset($_POST["ident"]) && isset($_POST["mdp"])){
                if ($_POST["ident"] == $_SESSION["ident"] && $_POST["mdp"] == $_SESSION["mdp"]){

                    $_SESSION["connexionok"] = true;
                    $_SESSION["Nom"] = "Taibi"; 
                    $_SESSION["Prénom"] = "Jamal";
                    $_SESSION["Age"] = 32;
                    $_SESSION["role"] = "Etudiant";
                    header("Location: ?page=accueil");
                    exit(); 
                } else{ 
                    $_SESSION["connexionok"] = false;
                        echo"<h3 class='pasco'> Identifiant ou mot de passe incorect </h3>";
                }
            }
            elseif (isset ($_GET ['page']) && $_GET['page'] == 'paramètres') {
                if (!isset ($_SESSION ['connexionok']) || $_SESSION ['connexionok'] == false){
                    echo "<h3 class='avertco'> Vous devez être connecté pour avoir accès.</h3>";
                }else {
                    echo '<h2 class="modif"> Modification de vos paramètres </h2>';

                    if ($afficherFormulaire){
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modif'])){
                            if (!empty($_POST["Nom"]) && !empty($_POST["Prénom"]) && !empty($_POST["Age"]) && !empty($_POST["role"])) {
                                $_SESSION["chamrempli"] = true;
                                $_SESSION["Nom"] = $_POST["Nom"];
                                $_SESSION["Prénom"] = $_POST["Prénom"];
                                $_SESSION["Age"] = $_POST["Age"];
                                $_SESSION["role"] = $_POST["role"];
                                echo "<p class='valide'>Vos paramètres ont été modifiés avec succès !</p>";   
                            }else{
                                echo "<p class='erreur'>Veuillez remplir tous les champs avant de modifier vos paramètres.</p>";
                            }
                            $afficherFormulaire = false;
                        }else{
                            echo genererFormulaire();
                        }
                    }
                }
            }      
        }

//connexion//

        if (isset ($_GET ['page']) && $_GET['page'] == 'connexion'){
            if (!isset ($_SESSION ['connexionok']) || $_SESSION['connexionok']== false){
                echo'<div class="formconect">
                        <form method="POST">
                            <label for="">Identifiant</label> <br>
                            <input type="text" id="ident" name="ident"> <br>
                            <label for="">Mot de Passe</label> <br>
                            <input type="password" id="mdp" name="mdp"> <br>
                            <input class="btn" type="submit" name="submit" value = "Se connecter">
                        </form>
                    <div/>';
            }
            if (isset($_POST["ident"]) && isset($_POST["mdp"])){
                if ($_POST["ident"] == $_SESSION["ident"] && $_POST["mdp"] == $_SESSION["mdp"]){
                    $_SESSION["connexionok"] = true;
                    $_SESSION["Nom"] = "Taibi"; 
                    $_SESSION["Prénom"] = "Jamal";
                    $_SESSION["Age"] = 32;
                    $_SESSION["role"] = "Etudiant";
                    echo "<h3 class='co'> Vous êtes connecté.</h3>";
                }
             else { 
                    $_SESSION["connexionok"] = false;
                    echo"<h3 class='pasco'> Identifiant ou mot de passe incorect </h3>";
                }
            };
        }

// deconexion//

        if (isset ($_GET ['page']) && $_GET['page'] == 'deconnexion'){      
            session_destroy();
            header("Location: ?page=connexion");
            exit();
        }    
    ?>
</body>
</html>
<?php
ob_end_flush(); 
?>