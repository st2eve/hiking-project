<?php
session_start();
/*
 * Ici, on définit les routes de notre application.
 * Nouvelle page ? => Nouvelle route
 */

$routes = [
    // Routes de la méthode GET (typiquement afficher une page)
    'GET' => [
        '/' => 'core/home.php',
        '/home' => 'view/homepage.php',
        '/contact' => 'view/contact.php',
        '/404' => 'view/404.php',
        '/login' => 'view/user/login.php',
        '/profile' => 'view/user/profile.php',
        '/update-hike' => 'view/user/update.php',
        '/register' => 'view/user/register.php',
        '/sessiontest' => 'view/user/sessiontest.php',
        '/logout' => 'view/user/logout.php',
        '/delete' => 'view/user/delete.php',
        '/hike'=> 'view/singlehike.php',

    ],
    // Routes de la méthode POST
    'POST' => [
        '/register' => 'view/user/register.php',
        '/contact' => 'view/contact.php',
        '/profile' => 'view/user/profile.php',
        '/update-hike' => 'view/user/update.php',
        '/login' => 'view/user/login.php',
        '/delete' => 'view/user/delete.php',
    ],
];