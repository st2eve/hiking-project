<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start ();

    require '../core/dbconnexion.php';

    if (!$_SESSION['id']){
        echo "<h1>tu n'est pas connecter</h1>";
        echo '<br />';
    } else {
        echo '<h1>tu est connecter</h1>';
        echo '<br />';
        echo 'Votre Id est '.$_SESSION['id'].'.';
        echo '<br />';
    }

?>


<a href="logout">Logout</a>
<!-- <a href="login">Login</a> -->