<?php
    declare(strict_types=1);

    require 'includes/header.php';
    require_once('../core/dbconnexion.php');
?>

	<h1>Welcome to the Home page!</h1>

<?php
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

    require 'includes/footer.php'?>