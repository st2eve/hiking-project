<?php
declare(strict_types=1);

$servername = '188.166.24.55';
$username = 'elephant';
$password = 'rwwPbmHGPhilXjZi';

//On établit et vérifie la connexion
try{
    $connect = new PDO("mysql:host=$servername;dbname=jepsen6-elephant", $username, $password);

    //On définit le mode d'erreur de PDO sur Exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie';
}

/*On capture les exceptions si une exception est lancée et on affiche
 *les informations relatives à celle-ci*/
catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}