<?php

session_start();
require 'auth.php';
if(auth::isMember())
{ }
 else { header("location:login.php"); }     
?>

<html>
    <body>
        <h1>Page Membres</h1>
        <a href="logout.php"> Deconnexion</a>
    </body>
</html>
