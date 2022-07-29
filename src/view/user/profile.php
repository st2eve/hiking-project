<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../view/includes/header.php';
require '../core/dbconnexion.php';

if(!empty($_POST)){
  
  $hikename=$_POST['hikename'];
  $hikedate=$_POST['hikeDate'];
  $hikedistance=$_POST['hikedistance'];
  $hikeduration=$_POST['hikeduration'];
  $hikeelevation=$_POST['hikeelevation'];
  $hikedesc=$_POST['hikedesc'];

  $hikesql = "INSERT INTO hikes (name, date, distance, duration, elevation_gain, description)
  VALUES (?, ?, ?, ?, ?, ?)";

  $hikevalues = array($_POST['hikename'], $_POST['hikeDate'], $_POST['hikedistance'], $_POST['hikeduration'], $_POST['hikeelevation'], $_POST['hikedesc']);

  $hikestatement = $connect->prepare($hikesql);

  $hikestatement->execute($hikevalues);

  header('location: http://localhost:3000/profile');

}else{
  echo 'No empty field authorized';
}
?>
<body>
    <div class="main-block">
        <form action="" method="POST" class="main-form">
            <div class="form-container">
                <h1>Add Hike</h1>
                <p>Please fill in this form to create a Hike.</p>
                <hr>

                <label for="hikeDate"><b>hikedate</b></label>
                <input type="text" value="<?php echo date('d-m-Y'); ?>" name="hikeDate" class="form-hikedate" required>

                <label for="hikename"><b>hikename</b></label>
                <input type="text" placeholder="Enter Name" name="hikename" class="form-hikename" required>

                <label for="hikedistance"><b>hikedistance</b></label>
                <input type="number" placeholder="Enter a Distance (km)" name="hikedistance" class="form-hikedistance" required>

                <label for="hikeduration"><b>hikeduration</b></label>
                <input type="number" placeholder="Enter a Duration (min)" name="hikeduration" class="form-hikeduration" required>
                
                <label for="hikeelevation"><b>hikeelevation</b></label>
                <input type="number" placeholder="Enter an Elevation (m)" name="hikeelevation" class="form-hikeelevation" required>

                <label for="hikedesc"><b>hikedesc</b></label>
                <input type="text" placeholder="Enter a Description" name="hikedesc" class="form-hikedesc" required>

                <button name="submit" type="submit" class="addhikebtn">Add a Hike</button>
            </div>
        </form>
    </div>
  </body>

  <?php
  require '../view/includes/footer.php';
  ?>
