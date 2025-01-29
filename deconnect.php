<?php
session_start();
session_destroy();// detruire toute les sessions
//rediriger vers le formulaire de connexion
header('location:./index.php');
?>