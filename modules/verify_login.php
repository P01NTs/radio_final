<?php

if (!isset($_COOKIE['login_token']) ) {
    $_SESSION = array();
    session_destroy();
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/ra/login.php');
    exit();
}
