<?php
    declare(strict_types=1);

    require 'includes/header.php';
    require_once('core/dbconnexion.php');
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

    // On verifie si il y a une session si pas dessesion on affiche "Login" "register", si session on affiche le username
    /*if (!isset($_SESSION['id'])){
        echo '<a href="login">Login</a>';
        echo '<a href="register">Register</a>';
    } else {
        echo '<p>Oh hi <a href="profile">'.$_SESSION['username'].'</a>!</p>';
        echo '<a href="logout">Logout</a>';
    }*/
?>
<body>
  <div class="main-block">
        <div class="flex">
            <?php
                // On affiche chaque tags un à un
                foreach ($tags as $tag) {
            ?>
            <a href='#'><?php echo $tag['name']; }?></a>
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
                <p class="hikes-box-p">Elevation gain : <?php echo $hike['elevation_gain'];?>%</p>
                <p class="hikes-box-p">Decription : <?php echo $hike['description'];?></p>
                <p class="hikes-box-p">Tag : <a href ='#'><?php echo $hike['tags'];?></a></p>
            </div>
        <?php
        }
        ?>

        </div>
    </div>
</body>
<?php
    require 'includes/footer.php';
?>