<?php
// includes functions.php file 
include_once "./includes/functions.php";
$db =   connect_to_database();
session_start();
include_once "./modules/program_card.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php import_css() ?>
    <link rel="stylesheet" href="./pages/radio/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algérian Radio |</title>
</head>

<body>
    <?php
    include "./includes/header.php";

    ?>
    <div class="hidden_menu">
        <?php
        $sql = "SELECT * FROM radio";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='radio_logo' id='" . $row['radio_id'] . "'><img src='/ra/assets/radio_logo/logo---" . str_replace(' ', '-', $row['radio_name']) . ".png' alt=' srcset=' /></div>";
            }
        }
        ?>
    </div>
    <div class="container">
        <div class="title"></div>
        <div class="card-container">
            <?php
            display_programe(1);
            ?>
        </div>
    </div>

</body>
<script>
    // Get all div elements with the class "radio_logo"
    const radioLogoss = document.querySelectorAll('.hidden_menu .radio_logo');

    // Add click event listener to each div element
    radioLogoss.forEach((radioLogo) => {
        radioLogo.addEventListener('click', () => {
            // Get the corresponding id from the data-id attribute
            const id = radioLogo.id;
            // Update the link with the new id
            var url = new URL(window.location.href);

            // Update the id parameter
            url.href = "http://localhost/ra/pages/radio/"
            url.searchParams.set("id", id); // Change "2" to the desired new value
            console.log(url)
            // Replace the current URL with the updated one
            history.replaceState(null, null, url.toString());
            window.location.href = url.toString();
        });
    });
</script>

</html>