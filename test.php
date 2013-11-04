<?php

session_start();
require 'auth.php';
if(auth::isLogged())
{ }
 else { header("location:login.php"); }     
?>

<html>
    <body>
        <h1>Page Privé</h1>
        <a href="admin.php">page administration</a>
        <a href="membre.php">page Membres</a>
        <a href="logout.php"> Deconnexion</a>
    </body>
</html>
