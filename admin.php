<?php

session_start();
require 'auth.php';
if(auth::isAdmin())
{ }
 else { header("location:login.php"); }   
 
?>

<html>
    <body>
        <h1>Page Admin</h1>
        <a href="logout.php"> Deconnexion</a>
    </body>
</html>
