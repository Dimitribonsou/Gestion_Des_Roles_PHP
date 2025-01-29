<?php
session_start();// demarrer la session dans cette page
        // verifier si les donnees ont ete soumis depuis le serveurs
        if(isset($_POST["send"]))
        {
            include_once './fonction.php';
            // recuperer les elements envoyer
            $nom =htmlspecialchars($_POST["nom"]);
            $password =htmlspecialchars($_POST["mdp"]);
            // appeller la fonction connexion ecrit plus haut pour verifier la connexion
            $resultat =Connection($nom,$password);
            if($resultat["result"] && $resultat["role"]=='admin')
            {
                // si le role admin rediriger vers la page des admins
                header("location:./home_admin.php");
            }
            elseif($resultat["result"] && $resultat["role"]=='user')
            {
                // si le role n'est pas admin rediriger vers l'interface des utilisateurs simple
                header("location:./home_user.php");
            }
            else
            {
                // si le role n'est pas admin rediriger vers l'interface des utilisateurs simple
                header("location:./index.php?message=".$resultat['message']);
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connecter vous a votre compte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <div class="img_block">
            <img src="./Images/login.png" alt="image login">
        </div>
        <div class="form_block">
            <div class="header">
                <h3>Bienvenue sur <strong>PHDL</strong></h3>
                <span>Connecter vous a votre compte  <strong class="header_profil">PHDL</strong></span>
            </div>
            <form action="" method="post">
                   <div class="input">
                       <label for="nom">Nom</label>
                       <input type="text" name="nom" required maxlenght="30" minlength="3">
                   </div>
                   <div class="input">
                       <label for="mdp">mot de passe</label>
                       <input type="password" name="mdp" required minlength="8" maxlength="20">
                   </div>
                   <div class="input">
                       <input type="submit" name="send" value="Connexion">
                   </div>
                   <div class="input">
                       <span>Nouveau sur PHDL? <a href="./signUp">Creer un Compte</a></span>
                   </div>
            </form>
        </div>
   </div>
</body>
</html>
