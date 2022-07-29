<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../src/css/404.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <html lang="fr"></html>
    <title>PAGE 404</title>
</head>
<body class="body-404">
    <header>
        <h2 class="h2-404">Rien a voir ici !</h2>
    </header>
    <style>
        /*-----------------IMPORT-----------------------*/
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

        /*------------------BODY------------------------*/
        .body-404{
            background-color: rgb(31, 31, 31);
            color: rgb(255, 255, 255);
            text-align: center;
            font-family: 'Roboto Mono', monospace;
        }
        /*-----------------HEADER-----------------------*/

        .h2-404{
            margin: 3% auto;
            text-decoration: underline;
        }

        /*-----------------MAIN-------------------------*/

        .secondeh1{
            margin-top: 10%;
        }

        .secondeh1:hover{
            color: #fff;
            text-shadow: 0 0 10px #fff,
                        0 0 20px #fff, 
                        0 0 40px #fff;
        }

        .h3-404{
            margin-bottom: 3%;
        }

        .p-404{
            font-size: 0.9rem;
        }

        /*-----------------FOOTER-----------------------*/

        .nav-404{
            margin-top: 10%;
        }

        .a-404{
            color: rgb(255, 255, 255);
            text-decoration: none;
            border: 5px solid red;
            padding: 5px;
            background-color: red;
            border-radius: 5px;
        }

        .a-404:hover{
            color: rgb(255, 40, 40);
            border: 5px solid #fff;
            background-color: #fff;
            border-radius: 5px;
            filter: drop-shadow(0 0 0.5rem rgb(255, 255, 255));
        }
    </style>
    <main class="main-404">
        <h1 class="h1-404">404</h1>
        <h3 class="h3-404">Oops ... This page not found!</h3>
        <p class="p-404">Dans le World Wide Web, l’erreur 404 signale que la ressource demandée, généralement une page Web, n'a pas été trouvée.</p>
    </main>
    <footer>
        <nav class="nav-404">
            <a class="a-404" href="home">page accueille</a>
        </nav>
    </footer>
</body>