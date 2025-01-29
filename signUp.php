<?php
session_destroy();// supprimer toute les sessions existantes
// recuperer les donnees soumis depuis le serveur
        if(isset($_POST["send"]))
        { 
          //importer le fichier contenant les fonctions pour utiliser la fonction Incription
            include_once "./fonction.php";
          // recuperer les donnees envoyer depuis le formulaire
          $nom =htmlspecialchars($_POST["nom"]);
          $email=htmlspecialchars($_POST["email"]);
          $password=htmlspecialchars(($_POST["mdp"]));
          // appel de la fonction pour effectuer l'insertion 
          $message=Inscription($nom,$email,$password);
          echo $message;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un Compte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <div class="img_block">
            <img src="./Images/signUp.png" alt="image login">
        </div>
        <div class="form_block">
            <div class="header">
                <h3>Bienvenue sur <strong>PHDL</strong></h3>
                <span>Creer votre compte sur  <strong class="header_profil">PHDL</strong></span>
            </div>
            <form action="" method="post">
                   <div class="input">
                       <label for="nom">Nom</label>
                       <input type="text" name="nom" required maxlenght="30" minlength="3">
                   </div>
                   <div class="input">
                       <label for="email">Email</label>
                       <input type="email" name="email" required maxlenght="30" minlength="3">
                   </div>
                   <div class="input">
                       <label for="mdp">mot de passe</label>
                       <input type="password" name="mdp" required minlength="8" maxlength="20">
                   </div>
                   <div class="input">
                       <input type="submit" name="send" value="Creer compte">
                   </div>
                   <div class="input">
                       <span>J'ai deja un compte ? <a href="./login.php">Connectez vous</a></span>
                   </div>
            </form>
        </div>
   </div>
</body>
</html>
