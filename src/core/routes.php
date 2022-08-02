<?php

/*
 * Ici, on définit les routes de notre application.
 * Nouvelle page ? => Nouvelle route
 */

$routes = [
    // Routes de la méthode GET (typiquement afficher une page)
    'GET' => [
        '/' => 'view/homepage.php',
        '/home' => 'view/homepage.php',
        '/contact' => 'view/contact.php',
        '/404' => 'view/404.php',
        '/login' => 'view/user/login.php',
        '/profile' => 'view/user/profile.php',
        '/profile/:username' => 'view/user/profile.php',
        '/register' => 'view/user/register.php',
        '/sessiontest' => 'view/user/sessiontest.php',
        '/logout' => 'view/user/logout.php',

    ],
    // Routes de la méthode POST
    'POST' => [
        '/register' => 'view/user/register.php',
        '/profile' => 'view/user/profile.php',
        '/login' => 'view/user/login.php',
    ],
];