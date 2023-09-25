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
    <title>selectionner radio</title>
  
</head>

<body>

<a href="/ra/index.php">Cancel</a>
    <div class="hidden_menu">
        <?php
        $sql = "SELECT * FROM radio";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<form method='post'>";
            while ($row = mysqli_fetch_assoc($result)) {
                if($ajouter == "audio"){
                    echo "<a href='/ra/redirect/program.php?id=" . $row['radio_id'] . "' class='radio_logo small' id='" . $row['radio_id'] . "'><img src='../assets/radio_logo/logo---" . str_replace(' ', '-', $row['radio_name']) . ".png' alt=' srcset=' /></a>";
                }
                if($ajouter == "program"){
                    echo "<a href='/ra/redirect/add_program.php?id=" . $row['radio_id'] . "' class='radio_logo small' id='" . $row['radio_id'] . "'><img src='../assets/radio_logo/logo---" . str_replace(' ', '-', $row['radio_name']) . ".png' alt=' srcset=' /></a>";
                }
            }
        }
        ?>
</body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        form {
            display: flex;
            flex-wrap: wrap;
        }

        .hidden_menu {
            display: flex;
            flex-wrap: row;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .radio_logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            color: #333;
            width: 200px;
        }

        .radio_logo:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        .radio_logo img {
            max-width: 100%;
            height: auto;
        }

        .radio_name {
            margin-top: 10px;
            font-weight: bold;
        }

        .small {
            width: 100px;
            height: 100px;
        }
    </style>
</html>