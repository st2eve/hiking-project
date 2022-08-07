<?php
    declare(strict_types=1);

    require 'includes/header.php';
    require_once('../core/dbconnexion.php');

    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $components = parse_url($url);
    parse_str($components['query'], $results);

    // On récupère tout le contenu de la table Tags
    $allTags = $connect->prepare('SELECT * FROM Tags');
    $allTags->execute();
    $tags = $allTags->fetchAll();
    
    // On récupère tout le contenu de la table Hikes
    $allHikes = $connect->prepare("SELECT * FROM hikes WHERE tags LIKE '%".$results['tag']."%'");
    $allHikes->execute();
    $hikes = $allHikes->fetchAll();

    if(!$results['tag']){
        // On récupère tout le contenu de la table Hikes
        $allHikes = $connect->prepare("SELECT * FROM hikes");
        $allHikes->execute();
        $hikes = $allHikes->fetchAll();
    }

?>
<body>
  <div class="main-block">
        <div class="flex">
            <?php
                // On affiche chaque tags un à un
                foreach ($tags as $tag) {
            ?>
            <a href='home?tag=<?php echo $tag['name']; ?>'><?php echo $tag['name']; }?></a>
        </div>
        <div class="big-flex">

            <?php
            // On affiche chaque hikes un à un
                foreach ($hikes as $hike) {
            ?>
            <div class="hikes-box">
                <h3 class="hikes-box-h3"><?php echo $hike['name'];?></h3>
                <h5 class="hikes-box-h5"><?php echo $hike['date'];?></h5>
                <p class="hikes-box-p"><u>Distance :</u> <?php echo $hike['distance'];?> Km</p>
                <p class="hikes-box-p"><u>Duration :</u> <?php echo $hike['duration'];?> minutes</p>
                <p class="hikes-box-p"><u>Elevation gain :</u> <?php echo $hike['elevation_gain'];?> m</p>
                <p class="hikes-box-p"><u>Decription :</u> <?php echo $hike['description'];?></p>
                <p class="hikes-box-p"><u>Tag(s) :</u> <a name="value-tags" href ='#'><?php echo $hike['tags']; ?></a></p>
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