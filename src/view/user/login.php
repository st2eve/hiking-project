<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

   //Require la db
   require '../core/dbconnexion.php';
 
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
                     
                     header('location: home');
                  } else {
                     echo"<center><h5 class='text-danger'>Password or username is not correct</h5></center>";
                  }
               } else {
                  echo"<center><h5 class='text-danger'>Password or username is not correct</h5></center>";
               }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<body>
   <main>
      <div>
         <div>
               <div>
                  <div>
                     <h4>Login</h4>
                  </div>
                  <div>
                     <form method="post" action="">
                           <div>
                              <label>Username</label>
                              <input type="text" name="username" required="required"/>
                           </div>
                           <div>
                              <label>Password</label>
                              <input type="password" name="password" required="required"/>
                           </div>
                           <button name="login">Login</button>
                     </form>
                     <a href="home">Home</a>
                  </div>
               </div>
         </div>
      </div>
   <main>
</body>
<?php
    require '../view/includes/footer.php';
?>
</html>