<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'view/includes/header.php';
require 'core/dbconnexion.php';

if (isset($_SESSION['id'])){

  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $components = parse_url($url);
  parse_str($components['query'], $results);

  if($_SESSION['username'] != $results['user']){
    @session_destroy();
    header('location: https://one-more-hike.herokuapp.com/login');
  }

// On récupère tout le contenu de la table Tags
$allTags = $connect->prepare('SELECT * FROM Tags');
$allTags->execute();
$tags = $allTags->fetchAll();

if(!empty($_POST)){
  
  $hikename=htmlspecialchars($_POST['hikename'], ENT_QUOTES);
  $hikedate=$_POST['hikeDate'];
  $hikedistance=$_POST['hikedistance'];
  $hikeduration=$_POST['hikeduration'];
  $hikeelevation=$_POST['hikeelevation'];
  $hikedesc=htmlspecialchars($_POST['hikedesc'], ENT_QUOTES);
  $tagsCheckbox = implode(',', $_POST['tagsCheckbox']);
  $hikeimg=htmlspecialchars($_POST['hikeImg'], ENT_QUOTES);

  $hikesql = "INSERT INTO hikes (name, date, distance, duration, elevation_gain, description, tags, userID, url_img)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $hikevalues = array($_POST['hikename'], $_POST['hikeDate'], $_POST['hikedistance'], $_POST['hikeduration'], $_POST['hikeelevation'], $_POST['hikedesc'], implode(',', $_POST['tagsCheckbox']), $_SESSION['id'], $hikeimg);

  $hikestatement = $connect->prepare($hikesql);

  $hikestatement->execute($hikevalues);

  $hikeiD = $connect->prepare('SELECT LAST_INSERT_ID() FROM `hikes`');
  $hikeiD->execute();

  header("Location: https://one-more-hike.herokuapp.com/profile?user=".$_SESSION['username']);

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
                <h1>Add a Hike</h1>
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
                <textarea type="text" placeholder="Enter a Description" name="hikedesc" class="form-hikedesc" required></textarea>

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

                <label for="hikeImg"><b>URL of your image</b></label>
                <input type="text" name="hikeImg" placeholder="Enter Image URL" class="form-hikeimg" required>

                <button name="submit" type="submit" class="addhikebtn">Add a Hike</button>
                
            </div>
        </form>
        <div class="big-flex">
        <?php
        // On affiche chaque hikes un à un
            foreach ($hikes as $hike) {
        ?>
        <div class="hikes-box">
            <div class="hikes-box-icon">
              <a href="https://one-more-hike.herokuapp.com/update-hike?user=<?php echo $_SESSION['username'] ?>&id=<?php echo $hike['hikeID'] ?>"><img src="public/IMG/editer.png" alt="edit"></a>
              <a href="https://one-more-hike.herokuapp.com/delete?id=<?php echo $hike['hikeID'] ?>" onclick="javascript: return confirm('Are you SURE you want to DELETE this Hike ?');"><img src="public/IMG/supprimer.png" alt="delete"></a>
            </div>
            <div class="hikes-box-img">
              <img src="<?php echo $hike['url_img'];?>" alt="image of <?php echo $hike['name'];?>">
            </div>
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
  }else{
    header('location: https://one-more-hike.herokuapp.com/login');
  }
  require 'view/includes/footer.php';
  ?>