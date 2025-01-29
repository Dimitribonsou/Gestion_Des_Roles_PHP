<?php
  session_start();
  if(!isset($_SESSION['nom']))
  {
     header('location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Acceuil Utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <a class="btn" href="./deconnect.php">Deconnecter</a>
        <main>
            <article>
                <h1>Bienvenue Cher <strong class="nom"><?php echo $_SESSION['nom']?> ,</strong> vous êtes connecté au système en tant que <strong>Utilisateur Simple</strong></h1>
            </article>
            <article>
                <img src="./Images/Welcome-cuate.png" alt="image de bienvenue">
            </article>
        </main>
    </section>

</body>
</html>