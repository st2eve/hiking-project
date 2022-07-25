<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once('../core/dbconnexion.php');

// On récupère tout le contenu de la table Tags
$allTags = $connect->prepare('SELECT * FROM Tags');
$allTags->execute();
$tags = $allTags->fetchAll();


// On affiche chaque tags un à un
foreach ($tags as $tag) {
?>
    <p><?php echo $tag['name']; ?></p>
<?php
}
?>