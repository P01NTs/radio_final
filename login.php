<?php
session_start();
include_once("./includes/functions.php");
if(isset($_SESSION["login_token"])){
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ra");
            exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="./css/login.css" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="./js/index.js" defer></script>
</head>

<body>
  <form class="login-form" method="get">
    <div class="imgcontainer">
      <img src="./assets/img/logo_radio_algerie.svg" alt="Avatar" class="avatar" />
    </div>

    <div class="container">
      <div class="input-container">
        <img id="userIcon" src="./assets/icon/person_FILL0_wght400_GRAD0_opsz48.png" alt="" srcset="" />
        <input class="inputLogin" id="email" type="text" placeholder="e-mail" name="email" required />
      </div>

      <div class="input-container">
        <img id="passwordIcon" src="./assets/icon/lock_FILL0_wght400_GRAD0_opsz48.png" alt="" />
        <input class="inputLogin" id="passwordInput" type="password" placeholder="Password" name="psw" required />
        <img class="showpsw" src="./assets/icon/eye-regular.svg">
      </div>
      
      <label class="rememberme">
        <input type="checkbox" name="remember[]" /><b></b> Remember me
      </label>
      <button class="submit" type="submit" name="login">Login</button>

      <?php
      if (isset($_GET['login'])) {
        connect_admin();
      }
      ?>
    </div>

    <div class="container" style="background-color: #f1f1f1">
      <a class="cancelbtn submit" href="./" id="cancel">Cancel</a>
    </div>
  </form>
</body>
<script src="./js/login.js"></script>

</html>