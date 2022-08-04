<?php
    declare(strict_types=1);

    require 'includes/header.php';
    require_once('../core/dbconnexion.php');
    session_start();
?>


<?php
    // On récupère tout le contenu de la table Tags
    $allTags = $connect->prepare('SELECT * FROM Tags');
    $allTags->execute();
    $tags = $allTags->fetchAll();

     // On récupère tout le contenu de la table Hikes
    $allHikes = $connect->prepare('SELECT * FROM hikes');
    $allHikes->execute();
    $hikes = $allHikes->fetchAll();
?>

    <div class="flex">
        <?php
            // On affiche chaque tags un à un
            foreach ($tags as $tag) {
        ?>
        <a class="a-home" href='#'><?php echo $tag['name']; }?></a>
    </div>
    <div class="big-flex">

        <?php
        // On affiche chaque hikes un à un
            foreach ($hikes as $hike) {
        ?>
        <div class="hikes-box">
            <h3 class="hikes-box-h3"><?php echo $hike['name'];?></h3>
            <h5 class="hikes-box-h5"><?php echo $hike['date'];?></h5>
            <p class="hikes-box-p">Distance : <?php echo $hike['distance'];?>Km</p>
            <p class="hikes-box-p">Duraction : <?php echo $hike['duration'];?>Minutes</p>
            <p class="hikes-box-p">Elevation gain : <?php echo $hike['elevation_gain'];?>m</p>
            <p class="hikes-box-p">Decription : <?php echo $hike['description'];?></p>
            <p class="hikes-box-p">Tag : <a class="a-home" href ='#'><?php echo $hike['tags'];?></a></p>
        </div>
    <?php
    }
    ?>

    </div>

<?php
    require 'includes/footer.php';
?>