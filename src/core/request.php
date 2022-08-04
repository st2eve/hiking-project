

<?php

class Request
{
    /*
     * On récupère l'uri de notre requête HTTP.
     * La méthode parse_url va spécifiquement prendre ce qui est situé
     * AVANT le point d'interrogation si il y en a un.
     * L'alternative est de le faire soi-même grace à la fonction explode() de php.
     */
    public static function uri(): string
    {
        // return explode('?', $_SERVER['REQUEST_URI'])[0];
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /*
     * On récupère la méthode HTTP de notre requete
     * Celle-ci sera soit GET, POST, PUT, PATCH, DELETE
     */
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}