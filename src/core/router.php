<?php

class Router
{
    // On va avoir besoin des routes dans la classe, je vais donc créer une propriété $routes
    protected array $routes = [];

    /*
     * Les routes étant définies dans un autre fichier, je vais utiliser la méthode register()
     * pour les importer dans ma classe et les stocker dans la propriété $routes
     */
    public function register(array $routes): void
    {
        $this->routes = $routes;
    }

    /*
     * Le gros de la classe Router.
     * Ici, on vérifie si l'uri existe dans les clés de l'array $routes.
     * Si oui, on require le fichier dont le chemin est défini dans les routes.
     * Si non, on renvoie une page 404 (si faite)
     */
    public function direct(string $uri, string $method): void
    {
        if (array_key_exists($uri, $this->routes[$method])) { // $uri = '/home'
            require_once $this->routes[$method][$uri]; // require_once 'app/views/homepage.php'
        } else {
            require_once('../view/404.php');
        }
    }
}