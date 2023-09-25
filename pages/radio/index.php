<?php
session_start();
include_once("../../includes/functions.php");
$db = connect_to_database();
require "../../modules/verify_radio.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My radio | <?php echo $data['radio_name']; ?></title>
</head>

<body>
    <?php
    include "../../includes/header.php";
    ?>

    <div class="background-img" style="background-image: url('../../assets/banner/ban---<?php echo str_replace(' ', '-', $data['radio_name']); ?>.png');">
        <div class="background-img-container">

            <div class="radio_title"><?php echo $data["radio_name"]; ?></div>

            <?php
            require "../../modules/radio_list.php";
            ?>


            <div class="social">
                <a class="link fb">
                    <img src="../../assets/icon/facebook.svg" alt="" />
                </a>
                <a class="link insta">
                    <img src="../../assets/icon/square-instagram.svg" alt="" />
                </a>
                <a class="link yt">
                    <img src="../../assets/icon/youtube.svg" alt="" />
                </a>
            </div>
        </div>

    </div>
    <?php
    require "../../modules/radio_menu.php";
    ?>
    <div class="wrapper">
        <div class="card_container">
            <?php display_program($id); ?>
        </div>
    </div>
    <?php
    require "../../includes/footer.php";
    ?>
</body>

</html>