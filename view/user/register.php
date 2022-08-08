<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'view/includes/header.php';
require 'core/dbconnexion.php';

if(!empty($_POST)){

  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $psw=$_POST['psw'];
  $psw_check=$_POST['psw-check'];

  $passwordhache = password_hash($_POST['psw'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO Users (firstname, lastname, username, email, password)
  VALUES (?, ?, ?, ?, ?)";

  $values = array($firstname, $lastname, $username, $email, $passwordhache, );

  $statement = $connect->prepare($sql);
  
  if($psw != $psw_check){
    echo "<p class='psw-error'>Your passwords aren't identical, please check them.</p>";
  }else{
    $statement->execute($values);
    header('location: https://one-more-hike.herokuapp.com/login');
  }

}
?>
<body>
    <div class="main-block">
        <form action="" method="POST" class="main-form">
            <div class="form-container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" class="form-email" required>

                <label for="firstname"><b>Firstname</b></label>
                <input type="text" placeholder="Enter Firstname" name="firstname" class="form-email" required>

                <label for="lastname"><b>LastName</b></label>
                <input type="text" placeholder="Enter LastName" name="lastname" class="form-email" required>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" class="form-email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" class="form-psw" required>

                <label for="psw-check"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-check" class="form-psw-repeat" required>
                <hr>

                <p class="form-conditions">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button name="submit" type="submit" class="registerbtn">Register</button>
            </div>

            <div class="container signin">
                <p>Already have an account? <a href="https://one-more-hike.herokuapp.com/login">Sign in</a>.</p>
            </div>
        </form>
    </div>
  </body>

  <?php
  require 'view/includes/footer.php';
  ?>