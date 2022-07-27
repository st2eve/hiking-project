<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../view/includes/header.php';
require '../core/dbconnexion.php';

session_start();

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $password_1 = mysqli_real_escape_string($connect, $_POST['psw']);
  $password_2 = mysqli_real_escape_string($connect, $_POST['psw-repeat']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "firstname is required"); }
  if (empty($lastname)) { array_push($errors, "lastname is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($connect, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO Users (firstname, lastname, username, email, password) 
  			  VALUES('$firstname', '$lastname', '$username', '$email', '$password_1')";
  	mysqli_query($connect, $query);
  	require_once('../user/profile.php');
  }
}
?>
<body>
    <div class="main-block">
        <form action="./register.php" method="POST" class="main-form">
            <div class="form-container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" class="form-email" required>

                <label for="firstname"><b>Firstname</b></label>
                <input type="text" placeholder="Enter Firstname" name="firstname" class="form-email" required>

                <label for="lastname"><b>LastName</b></label>
                <input type="text" placeholder="Enter LastName" name="lastname" class="form-email" required>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" class="form-email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" class="form-psw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" class="form-psw-repeat" required>
                <hr>

                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button name="reg_user" type="submit" class="registerbtn">Register</button>
            </div>

            <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a>.</p>
            </div>
        </form>
    </div>
  </body>

  <?php
  require '../view/includes/footer.php';
  ?>