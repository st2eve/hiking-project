<?php
declare(strict_types=1);


require_once('core/dbconnexion.php');
@session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link type="text/css" href="../../css/main.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
    <link rel="stylesheet" href="css/main.css">
    <title>One more Hike</title>
</head>
<body>
    <header>
        <?php
            // On verifie si il y a une session si pas dessesion on affiche "Login" "register", si session on affiche le username
            if (isset($_SESSION['username'])){
        ?>
        <div class="head-left" >
            <button name="home" class="header-btn" type="button"><a href="https://one-more-hike.herokuapp.com/home?tag=all">Home</a></button> 
            <button name="profile" class="header-btn" type="button"><a href="https://one-more-hike.herokuapp.com/profile?user=<?php echo $_SESSION['username'] ?>">Profile</a></button>
        </div>

        <div class="logo">
            <a href="http://https://one-more-hike.herokuapp.com/home?tag=all"><img src="IMG/Logo.png" alt="Logo" height="300px"></a>
        </div>

        <div class="head-right">
            <button name="logout" class="header-btn" type="button"><a href="logout">Logout</a></button>
            <button name="contact" class="header-btn" type="button"><a href="contact">Contact</a></button>
        </div>
        <?php
            } else {
        ?>
        <div class="head-left" >
            <button name="home" class="header-btn" type="button"><a href="https://one-more-hike.herokuapp.com/home?tag=all">Home</a></button> 
            <button name="contact" class="header-btn" type="button"><a href="contact">Contact</a></button>
        </div>
        <div class="logo">
                <a href="https://one-more-hike.herokuapp.com/home?tag=all"><img src="IMG/Logo.png" alt="Logo" height="300px"></a>
        </div>
        <div class="head-right">
            <button name="login" class="header-btn" type="button"><a href="https://one-more-hike.herokuapp.com/login">Login</a></button>
            <button name="register" class="header-btn" type="button"><a href="https://one-more-hike.herokuapp.com/register">Register</a></button>
        </div>
        <?php
            }
        ?>
    </header>
