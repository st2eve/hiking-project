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

     // On récupère tout le contenu de la table Hikes
    $allHikes = $connect->prepare('SELECT * FROM hikes');
    $allHikes->execute();
    $hikes = $allHikes->fetchAll();

    if (!$_SESSION['id']){
        echo "<h1>tu n'est pas connecter</h1>";
        echo '<br />';
        echo '<a href="login">Login</a>';
        echo '<br />';
        echo '<a href="register">Register</a>';
    } else {
        echo '<h1>tu es connecter</h1>';
        echo '<br />';
        echo '<p>Oh hi <a href="profile">'.$_SESSION['username'].'</a>!</p>';
        echo '<br />';
        echo '<a href="logout">Logout</a>';
    }
?>

    <div class="flex">
        <?php
            // On affiche chaque tags un à un
            foreach ($tags as $tag) {
        ?>
        <a href='#'><?php echo $tag['name']; }?></a>
    </div>
    <div>

        <?php
            foreach ($hikes as $hike) {
        ?>
        <div>
            <h3><?php echo $hike['name'];?></h3>
            <h5><?php echo $hike['date'];?></h5>
            <p>Distance : <?php echo $hike['distance'];?>Km</p>
            <p>Duraction : <?php echo $hike['duration'];?>Minutes</p>
            <p>Elevation gain : <?php echo $hike['elevation_gain'];?>%</p>
            <p>Decription : <?php echo $hike['description'];?></p>
            <p>Tag : <a href ='#'><?php echo $hike['tags'];?></a></p>
        </div>
    <?php
    }
    ?>

    </div>

<?php
    require 'includes/footer.php';
?>