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
        <div class="gauche" >
        <input type="button" src="http://localhost:3000/home" class="header-btn" value="home"/>
        <button name="home" type="button" class="registerbtn">Register</button> 
        <?php

        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        
           echo '<input type="button" src="http://localhost:3000/profile" class="header-btn"  value="Your Hikes"/>';
        
        }else{
            echo '<input type="button" src="http://localhost:3000/profile" class="header-btn"  value="Your Hikes"/>';
        }
        ?>
        </div>

        <div class="logo">
        <img src="IMG/Logo.png" alt="Logo" height="300px">
        </div>

        <div class="droite">
        <input type="button" src="http://localhost:3000/login" class="header-btn" value="Login"/>
        <input type="button" src="http://localhost:3000/register" class="header-btn" value="Sign up"/>
        </div>
        
    </header>