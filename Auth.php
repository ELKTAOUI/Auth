<?php

require 'connexion.php';

class Auth {

    static function isLogged() {
        if (isset($_SESSION['Auth']) && isset($_SESSION['Auth']['login']) && isset($_SESSION['Auth']['pass'])) {
            extract($_SESSION['Auth']);
            $sql = "select * from user where login='$login' and password='$pass'";
            $res = mysql_query($sql);
            if (mysql_num_rows($res) > 0) 
            {
                return true;
            } 
            else 
            {
                return false;
            }
        }
        else 
        {
                return false;
            }
    }

    static function isMember()
    {
        if(auth::isLogged() && $_SESSION['Auth']['role']=='membre')
        {
            return true;
        }
    }

    static function isAdmin()
    {
        if(auth::isLogged() && $_SESSION['Auth']['role']=='admin')
        {
            return true;
        }
    }


}
?>
