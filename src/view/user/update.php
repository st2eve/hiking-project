<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../view/includes/header.php';
require '../core/dbconnexion.php';

if (isset($_SESSION['id'])){

    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $components = parse_url($url);
    parse_str($components['query'], $results);

    if($_SESSION['username'] != $results['user']){
        @session_destroy();
        header('location: http://localhost:3000/login');
    }

    // On récupère tout le contenu de la table Tags
    $allTags = $connect->prepare('SELECT * FROM Tags');
    $allTags->execute();
    $tags = $allTags->fetchAll();

    $sql = "SELECT * FROM hikes WHERE userID=".$_SESSION['id'];

    $result = $connect->query($sql);
    $row = $result->fetch();

    if ($row > 0){

        $name = $row['name'];
        $distance = $row['distance'];
        $duration = $row['duration'];
        $elevation_gain = $row['elevation_gain'];
        $description = $row['description'];
        $tags = $row['tags'];

    } else {
        echo "Not Found";
    }

?>
<body>
  <div class="main-block">
    <form action="" method="POST" class="main-form">
        <div class="form-container">
            <p class="form-session">Oh hi <a href="profile"><?php echo $_SESSION['username'] ?></a>!</p>
            <h1>Update Hike</h1>
            <p>Please fill in this form to update a Hike.</p>
            <hr>

            <label for="hikename"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="hikename" class="form-hikename" value="<?php echo $name ?>" required>

            <label for="hikedistance"><b>Distance</b></label>
            <input type="number" placeholder="Enter a Distance (km)" name="hikedistance" value="<?php echo $distance ?>" class="form-hikedistance" required>

            <label for="hikeduration"><b>Duration</b></label>
            <input type="number" placeholder="Enter a Duration (min)" name="hikeduration" value="<?php echo $duration ?>" class="form-hikeduration" required>
                    
            <label for="hikeelevation"><b>Elevation</b></label>
            <input type="number" placeholder="Enter an Elevation (m)" name="hikeelevation" value="<?php echo $elevation_gain ?>" class="form-hikeelevation" required>

            <label for="hikedesc"><b>Description</b></label>
            <input type="text" placeholder="Enter a Description" name="hikedesc" value="<?php echo $description ?>" class="form-hikedesc" required>

            <div class="container-tags"> 
                <?php 
                    // On affiche chaque tags un à un
                    foreach ($tags as $tag) {
                ?>
                <label class="label-tags" for="checkbox"><b><?php echo $tag['name'];?></b></label>
                <input type="checkbox" name="tagsCheckbox[]" value="<?php echo $tag['name'];?>">
                <?php
                }
                ?>
            </div>

            <button name="submit" type="submit" class="addhikebtn">Update your Hike</button>
                    
        </div>
    </form>
    </div>
</body>
<?php
  }else{
    header('location: http://localhost:3000/login');
  }
  require '../view/includes/footer.php';
?>