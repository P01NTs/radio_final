<?php

include_once("../includes/functions.php");
session_start();
if (isset($_GET["id"])) {
    $ajouter = $_GET["id"];
}
$db = connect_to_database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>selectionner programme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .program_card {
            display: block;
            text-decoration: none;
            width: 200px;
            margin: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: #333;
        }

        .program_card:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        .program_card img {
            max-width: 100%;
            height: auto;
        }

        .program_name {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
        <a href="/ra/index.php">Cancel</a>
    <?php


    
    function display_programe($id)
    {
        $db = connect_to_database();
        $db->set_charset("utf8mb4"); // Set the desired character set
        $sql = "SELECT * FROM program WHERE radio_id = $id ";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Loop through each row and display data in cards
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a class='program_card' href='/ra/redirect/audio.php?id=" . $row['program_id'] . "&radioid=" . $id . "'>";
                echo "<img src='../assets/program_img/" . trim($row['program_name']) . ".jpg'/>";
                echo "<div class='program_name'>" . $row['program_name'] . "</div>";
                echo "</a>";
            }
        } else {
            echo "No data available.";
        }
    };

    display_programe($ajouter);

    ?>



</body>

</html>