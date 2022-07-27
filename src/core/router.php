<?php
 declare(strict_types=1);

 require_once('../core/request.php');

class Router{

    private $url; // l'url sur laquelle on souhaite se rendre
    private $routes = []; // il faut stocker les routes dans un tableau

    public function __construct($url){  //fonction construct qui prend en paramètre l'url

        $this->url = $url;

    }

    public function get($path, $callable){ //on crée la method get qui prendra en compte comme paramètre : le chemin et une closure appelable

        $route = new Route($path, $callable); // On initialise une instance de la classe Route

        $this->routes['GET'][] = $route; // une fois la route créée, elle sera stockée dans le tableau des routes et on précise que c'est une route sous la méthode "GET"

    }

    /*public function post($path, $callable){

        $route = new Route($path, $callable); // On initialise une instance de la classe Route

        $this->routes['POST'][] = $route; // une fois la route créée, elle sera stockée dans le tableau des routes et on précise que c'est une route sous la méthode "POST"
    
    }*/

    public function run(){ // fonction qui a pour but de vérifié si l'url écrite en paramètre correspond à une des urls

        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){ // On récupère la méthode utilisée ($_SERVER['REQUEST_METHOD']), donc si ce paramètre n'existe pas (if(!isset...), on renverra une exception.

            require_once '../view/404.php';

        }

        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){ // On parcours l'ensemble des routes qui sont semblables
            if($route->match($this->url)){ // On vérifie si la route correspond à l'url tapée
            
                return $route->call(); // On appelle la closure

            }
        }
        require_once '../view/404.php';
    }

}