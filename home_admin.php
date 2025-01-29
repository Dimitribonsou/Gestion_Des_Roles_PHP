<?php
  session_start();
  if(!isset($_SESSION['nom']) && !isset($_SESSION['role']))
  {
     header('location:index.php');
  }
  //rediriger tout les utilisateurs qui ne sont pas les administrateur vers le formulaire de connexion
  elseif(isset($_SESSION['role'])) 
  {
    // si l'utilisateur a le role user le rediriger vers le formulaire de connexion car il n'est pas
    //autoriser a acceder a la page des admins
     if($_SESSION['role']=='user')
       header('location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Acceuil Administrateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="flex">
            <a class="btn" href="./deconnect.php">Deconnecter</a>
            <a href="./home_admin.php">Acceuil</a>
            <a href="./UserList.php">Liste utilisateurs</a>
        </div>
    <main>
          <article>
               <h1>Bienvenue Cher <strong class="nom"><?php echo $_SESSION['nom']?> ,</strong> vous êtes connecté au système en tant que <strong>Administrateur</strong></h1>
          </article>
          <article>
              <img src="./Images/Welcome-cuate.png" alt="image de bienvenue">
          </article>
    </main>
    </section>

</body>
</html>