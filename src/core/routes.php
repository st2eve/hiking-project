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
        '/register' => 'view/user/register.php',

    ],
    // Routes de la méthode POST
    'POST' => [
        '/register' => 'view/user/register.php',
    ],
];