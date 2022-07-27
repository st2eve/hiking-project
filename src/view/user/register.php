<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../view/includes/header.php';
?>
<body>
    <div class="main-block">
      <h1>Registration</h1>
      <form action="/">
        <hr>
        <input type="text" name="name" class="name" placeholder="Email" required/>
        <input type="text" name="name" class="name" placeholder="Firstname" required/>
        <input type="text" name="name" class="name" placeholder="Lastname" required/>
        <input type="text" name="name" class="name" placeholder="Username" required/>
        <input type="password" name="name" class="name" placeholder="Password" required/>
        <hr>
        <div class="btn-block">
          <button type="submit" href="/">Submit</button>
        </div>
      </form>
    </div>
  </body>

  <?php
  require '../view/includes/footer.php';
  ?>