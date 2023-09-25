<?php
session_start();
include_once("../../includes/functions.php");
if (isset($_SESSION['login_token'])) {
    header('Location: pages/admin_dashboard');
    exit();
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../css/login.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="../../js/index.js" defer></script>
</head>

<body>
    <form class="emailForm" method="get">
        <div class="imgcontainer">
            <img src="../../assets/img/logo_radio_algerie.svg" alt="Avatar" class="avatar" />
        </div>

        <div class="container">
            <div class="input-container">
                <img id="userIcon" src="../../assets/icon/person_FILL0_wght400_GRAD0_opsz48.png" alt="" srcset="" />
                <input class="inputLogin" id="email" type="text" placeholder="e-mail" name="email" required />
            </div>
            <button class="submit" type="submit" name="send_email">Send Email</button>
            <?php
            if (isset($_GET['send_email'])) {
                send_email();
            }
            ?>
        </div>

        <div class="container" style="background-color: #f1f1f1">
            <a class="cancelbtn submit" href="../../" id="cancel">Cancel</a>
        </div>
    </form>
</body>
<script src="../../js/index.js"></script>

</html>