<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../view/includes/header.php';
require '../core/dbconnexion.php';

// On récupère tout le contenu de la table Tags
$allTags = $connect->prepare('SELECT * FROM Tags');
$allTags->execute();
$tags = $allTags->fetchAll();

if(!empty($_POST)){
  
  $hikename=$_POST['hikename'];
  $hikedate=$_POST['hikeDate'];
  $hikedistance=$_POST['hikedistance'];
  $hikeduration=$_POST['hikeduration'];
  $hikeelevation=$_POST['hikeelevation'];
  $hikedesc=$_POST['hikedesc'];
  $tagsCheckbox = implode(',', $_POST['tagsCheckbox']);

  $hikesql = "INSERT INTO hikes (name, date, distance, duration, elevation_gain, description, tags)
  VALUES (?, ?, ?, ?, ?, ?, ?)";

  $hikevalues = array($_POST['hikename'], $_POST['hikeDate'], $_POST['hikedistance'], $_POST['hikeduration'], $_POST['hikeelevation'], $_POST['hikedesc'], implode(',', $_POST['tagsCheckbox']));

  $hikestatement = $connect->prepare($hikesql);

  $hikestatement->execute($hikevalues);

  $hikeiD = $connect->prepare('SELECT LAST_INSERT_ID() FROM `hikes`');
  $hikeiD->execute();


  header('location: http://localhost:3000/profile');

}else{
?>

<body>
  <div class="main-block">
<?php
  echo '<p class="main-empty">No empty field authorized</p>';
}
?>

        <form action="" method="POST" class="main-form">
            <div class="form-container">
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
                <?php 
                    // On affiche chaque tags un à un
                    foreach ($tags as $tag) {
                ?>
                <label class="label-tags" for="checkbox"><b><?php echo $tag['name'];?></b></label>
                <input type="checkbox" name="tagsCheckbox[]" value="<?php echo $tag['name'];?>">
                <?php
                  }
                ?>

                <button name="submit" type="submit" class="addhikebtn">Add a Hike</button>
                
            </div>
        </form>
    </div>
  </body>
  <?php
  require '../view/includes/footer.php';
  ?>
