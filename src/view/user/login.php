<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

echo '<h1>Congratulations ! tu es sur la page connexion</h1>';

require '../view/includes/header.php';
?>

<form action='' class="main__form">
  <div class="form__email">
    <label for="exampleInputEmail1" class="email__label">Email address</label>
    <input type="email" class="email__input" aria-describedby="emailHelp">
    <div class="email__text">We'll never share your email with anyone else.</div>
  </div>
  <div class="form__password">
    <label for="exampleInputPassword1" class="password__label">Password</label>
    <input type="password" class="password__input">
  </div>
  <div class="form__check">
    <input type="checkbox" class="check__input">
    <label class="check__label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="form__submit">Submit</button>
</form>

<?php
    require '../view/includes/footer.php';
?>