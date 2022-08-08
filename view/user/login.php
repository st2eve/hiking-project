<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

   require 'view/includes/header.php';
   //Require la db
   require 'core/dbconnexion.php';
 
   // On check les donner dans le form
    if(ISSET($_POST['login'])){
      // On check que le form ne soit pas vide
        if($_POST['username'] != "" || $_POST['password'] != ""){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `Users` WHERE `username`=?";
            $query = $connect->prepare($sql);
            $query->execute(array($username));
            $row = $query->rowCount();
            $fetch = $query->fetch();
            if($row > 0) {
               // On check le hash du mpd
               if(password_verify($_POST['password'] , $fetch['password'])){
                  // On start la session
                     session_start();
                     echo"<center><h5 class='text-success'>Login successfully</h5></center>";
                     // On donne nos données a la session
                     $_SESSION['id'] = $fetch['userID'];
                     $_SESSION['firstname'] = $fetch['firstname'];
                     $_SESSION['lastname'] = $fetch['lastname'];
                     $_SESSION['username'] = $fetch['username'];
                     $_SESSION['email'] = $fetch['email'];
                     $_SESSION['password'] = $fetch['password'];
                     
                     header('location: https://one-more-hike.herokuapp.com/home?tag=all');
                  } else {
                     echo"<center><h5 class='text-danger'>Password or username is not correct</h5></center>";
                  }
               } else {
                  echo"<center><h5 class='text-danger'>Password or username is not correct</h5></center>";
               }
        }
    }
?>
<body>
   <div class="main-block">
      <form class="main-form" method="post" action="">
         <div class="form-container">
            <h1>Login</h1>
            <div class="form-username">
               <label>Username</label>
               <input type="text" name="username" required="required"/>
            </div>
            <div class="form-password">
               <label>Password</label>
               <input type="password" name="password" required="required"/>
            </div>
            <button class="loginbtn" name="login">Login</button>
         </div>
      </form>
   </div>
</body>
<?php
    require 'view/includes/footer.php';
?>