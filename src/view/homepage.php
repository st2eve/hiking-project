<?php
    declare(strict_types=1);

    require 'includes/header.php';
    require_once('../core/dbconnexion.php');
    session_start();
?>

	<h1>Welcome to the Home page!</h1>

<?php
    // On récupère tout le contenu de la table Tags
    $allTags = $connect->prepare('SELECT * FROM Tags');
    $allTags->execute();
    $tags = $allTags->fetchAll();

    if (!$_SESSION['id']){
        echo "<h1>tu n'est pas connecter</h1>";
        echo '<br />';
        echo '<a href="login">Login</a>';
        echo '<br />';
        echo '<a href="register">Register</a>';
    } else {
        echo '<h1>tu es connecter</h1>';
        echo '<br />';
        echo ' Oh hi '.$_SESSION['id'].'!';
        echo '<br />';
        echo '<a href="logout">Logout</a>';
    }


    // On affiche chaque tags un à un
    foreach ($tags as $tag) {
?>
    <p><?php echo $tag['name']; ?></p>
<?php
    }

    require 'includes/footer.php';
?>