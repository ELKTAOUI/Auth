<?php
require 'connexion.php';
require 'auth.php';
session_start();
if(isset($_POST) && isset($_POST['login']) && isset($_POST['pass']))
{
    extract($_POST);
    $login=  addslashes($login);
    $pass=  sha1($pass);
    //print_r($_POST);
    $sql="select * from user where login='$login' and password='$pass'";
    echo $sql;
    $res= mysql_query($sql);
    $data=mysql_fetch_array($res);
    if(mysql_num_rows($res)>0)
    {
        $_SESSION['Auth']=array(
            'login'=>$login,
            'pass'=>$pass,  
            'role'=>$data['role']
        );
        //print_r($_SESSION);
        header('location:prive.php');
    }
    else
    {
        echo 'Cordonneés Incorrectes ';
    }
}

if(!auth::isLogged())
{
?>
<html>
    <body>
        <h1>Authetification </h1>
        <form action="login.php" method="POST">
            <table border="0">
                    <tr>
                        <td>Login:</td>
                        <td><input type="text" name="login" value="" required /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="pass" value="" required /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Acceder" name="ok" /></td>
                    </tr>
            </table>

        </form>
<?php 
}else
{
    echo '<p>Vous etes Connectée </p> <br> <a href="logout.php">Deconnexion</a>';
} ?>
    </body>
</html>
