<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

   require '../core/dbconnexion.php';
 
    if(ISSET($_POST['login'])){
        if($_POST['username'] != "" || $_POST['password'] != ""){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `Users` WHERE `username`=? AND `password`=? ";
            $query = $connect->prepare($sql);
            $query->execute(array($username,$password));
            $row = $query->rowCount();
            $fetch = $query->fetch();
            if($row > 0) {
                echo"<center><h5 class='text-success'>Login successfully</h5></center>";
            } else{
                echo"<center><h5 class='text-danger'>Invalid username or password</h5></center>";
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