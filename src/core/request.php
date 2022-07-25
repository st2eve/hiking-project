<?php
 declare(strict_types=1);

// ce fichier servira à stocker les infos pour les requêtes pour le fichier router.php

require_once('../core/router.php');

class Route{
    
    private $path;
    private $callable;
    private $matches;

    public function __construct($path, $callable){

        $this->path = trim($path, "/");
        $this->callable = $callable;

    }

    public function match($url){ //stipulé si la route en paramètre est semblable à une autre route ou non

        $url = trim($url, "/"); // "trim()" enlève les espace avant et en fin de chaine. Si on spécifie un caractère (ici '/'), c'est lui qui sera enlevé.
        $path = preg_replace("#:([\w]+)#", "([^/]+)", $this->path); //On remplace n'importe quel caractère alphanumérique ('#:([\w]+)#'), par n'importe quoi qui n'est pas un slash ('([^\]+)') et on remplace ça ici ($this->path)
        $verif = "#^$path$#i"; // pour vérifier le chemin du début à la fin ("#^$path$#" => ^ = début / $path = le chemin / $ = la fin) et le flag 'i' c'est pour vérifié les majuscules et minuscules.
        
        if(!preg_match($verif, $url, $matches)){ // Si ça ne correspond pas à ces paramètres
            return false;
        }
        array_shift($matches); // enlève le 1er élément d'un tableau (ici car on ne veut pas récupérer l'url en entier)
        $this->matches = $matches; //on met dans cette variable les différentes correspondances
        return true;
        
    }

    public function call(){
        return call_user_func_array($this->callable, $this->matches); // on appelle la closure
    }

}