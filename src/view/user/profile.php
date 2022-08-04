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

// On verifie si il y a une session si pas dessesion on affiche "Login" "register", si session on affiche le username
if (isset($_SESSION['id'])){

if(!empty($_POST)){
  
  $hikename=$_POST['hikename'];
  $hikedate=$_POST['hikeDate'];
  $hikedistance=$_POST['hikedistance'];
  $hikeduration=$_POST['hikeduration'];
  $hikeelevation=$_POST['hikeelevation'];
  $hikedesc=$_POST['hikedesc'];
  $tagsCheckbox = implode(',', $_POST['tagsCheckbox']);
  $userID = $_POST[$_SESSION['id']];

  $hikesql = "INSERT INTO hikes (name, date, distance, duration, elevation_gain, description, tags, userID)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  $hikevalues = array($_POST['hikename'], $_POST['hikeDate'], $_POST['hikedistance'], $_POST['hikeduration'], $_POST['hikeelevation'], $_POST['hikedesc'], implode(',', $_POST['tagsCheckbox']), $_SESSION['id']);

  $hikestatement = $connect->prepare($hikesql);

  $hikestatement->execute($hikevalues);

  $hikeiD = $connect->prepare('SELECT LAST_INSERT_ID() FROM `hikes`');
  $hikeiD->execute();


  header("Location: http://localhost:3000/profile?user=".$_SESSION['username']);

}else{
?>

<body>
  <div class="main-block">
<?php
  echo '<p class="main-empty">No empty field authorized</p>';
}

// On récupère tout le contenu de la table Hikes lié à l'utilisateur connecté
$allHikes = $connect->prepare('SELECT * FROM hikes WHERE userID='.$_SESSION['id']);
$allHikes->execute();
$hikes = $allHikes->fetchAll();

?>

        <form action="" method="POST" class="main-form">
            <div class="form-container">
                <p class="form-session">Oh hi <a href="profile"><?php echo $_SESSION['username'] ?></a>!</p>
                <h1>Add Hike</h1>
                <p>Please fill in this form to create a Hike.</p>
                <hr>

                <label for="hikeDate"><b>Date</b></label>
                <input type="text" value="<?php echo date('d-m-Y'); ?>" name="hikeDate" class="form-hikedate" required>

                <label for="hikename"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="hikename" class="form-hikename" required>

                <label for="hikedistance"><b>Distance</b></label>
                <input type="number" placeholder="Enter a Distance (km)" name="hikedistance" class="form-hikedistance" required>

                <label for="hikeduration"><b>Duration</b></label>
                <input type="number" placeholder="Enter a Duration (min)" name="hikeduration" class="form-hikeduration" required>
                
                <label for="hikeelevation"><b>Elevation</b></label>
                <input type="number" placeholder="Enter an Elevation (m)" name="hikeelevation" class="form-hikeelevation" required>

                <label for="hikedesc"><b>Description</b></label>
                <input type="text" placeholder="Enter a Description" name="hikedesc" class="form-hikedesc" required>
                <div class="profil-div-tag">
                <?php 
                    // On affiche chaque tags un à un
                    foreach ($tags as $tag) {
                ?>
                <div class="flex-div-div">
                  <label class="label-tags" for="checkbox"><b><?php echo $tag['name'];?></b></label>
                  <input type="checkbox" name="tagsCheckbox[]" value="<?php echo $tag['name'];?>">
                </div>
                <?php
                  }
                ?>
                </div>
                <button name="submit" type="submit" class="addhikebtn">Add a Hike</button>
                
            </div>
        </form>
    </div>

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

    <div class="hikes-profile">
        <?php
        // On affiche chaque hikes un à un
            foreach ($hikes as $hike) {
        ?>
        <div class="hikes-box">
            <div class="hikes-box-icon">
            <a href="http://localhost:3000/update-hike?user=<?php echo $_SESSION['username'] ?>"><img src="../IMG/editer.png" alt="edit"></a>
              <img src="../IMG/supprimer.png" alt="delete">
            </div>
            <h3 class="hikes-box-h3"><?php echo $hike['name'];?></h3>
            <h5 class="hikes-box-h5"><?php echo $hike['date'];?></h5>
            <p class="hikes-box-p">Distance : <?php echo $hike['distance'];?>Km</p>
            <p class="hikes-box-p">Duraction : <?php echo $hike['duration'];?>Minutes</p>
            <p class="hikes-box-p">Elevation gain : <?php echo $hike['elevation_gain'];?>m</p>
            <p class="hikes-box-p">Decription : <?php echo $hike['description'];?></p>
            <p class="hikes-box-p">Tag : <a class="a-home" href ='#'><?php echo $hike['tags'];?></a></p>
            <p class="hikes-box-p">Elevation gain : <?php echo $hike['elevation_gain'];?>%</p>
            <p class="hikes-box-p">Decription : <?php echo $hike['description'];?></p>
            <p class="hikes-box-p">Tag : <a href ='#'><?php echo $hike['tags'];?></a></p>
        </div>
    <?php
    }
    ?>

    </div>

  </body>
  <?php
    } else {
?>
<body>
  <p>Your are not connected</p>

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

</body>
<?php
            }
        ?>
    </div>
  <?php
  }else{
    header('location: http://localhost:3000/login');
  }
  require '../view/includes/footer.php';
  ?>
