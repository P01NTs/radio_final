<?php
session_start();
include_once("../../includes/functions.php");
$db = connect_to_database();
require "../../modules/verify_program.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $data['program_name']; ?> | Radio Algérienne</title>
</head>

<body>
    <?php
    include "../../includes/header.php";
    ?>

    <div class="background-img" style="background-image: url('../../assets/banner/ban---<?php echo str_replace(' ', '-', $data['radio_name']); ?>.png');">
        <div class="background-img-container">
            <div class="radio_title"><?php echo $data["radio_name"]; ?></div>

            <div class="program_content" style="color:white">
                <?php echo "<b>" . $data['program_name'] . "</b>";
                echo "<br><p>" . $data['program_description'] . "</p>"; ?>
            </div>

            <div class="program_logo">
                <?php echo " <img style='width: 150px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; height: 150px;' src='../../assets/program_img/" . trim($data['program_name']) . ".jpg'/>"; ?>
            </div>
        </div>
    </div>
    <?php
    require "../../modules/radio_menu.php";
    ?>
    <div class="wrapper">
        <?php
        $id = $_GET['id'];
        // Validate and sanitize the 'id' parameter if necessary

        $stmt = $db->prepare("SELECT * FROM `audio` WHERE program_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <table class="spotify-table">
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Taille</th>
            </tr>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr data-audio='../../uploads/" . htmlspecialchars($row['audio_name']) . "'>";
                    echo "<td>" . htmlspecialchars($row['audio_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['audio_date']) . "</td>";
                    echo "<td>" . round(($row['audio_size'] / 1024), 2) . " KB</td>";
                    echo "</tr>";
                }
            } else {
                // Handle database query error here
                echo "Error: " . mysqli_error($db);
            }
            ?>
        </table>

        </table>

        <div class="audio-player">
            <audio id="audio-element" controls></audio>
        </div>
    </div>
</body>

<script>
    const audioPlayer = document.getElementById("audio-element");
    const tableRows = document.querySelectorAll(".spotify-table tbody tr");

    tableRows.forEach((row) => {
        row.addEventListener("click", () => {
            const audioPath = row.getAttribute("data-audio");
            audioPlayer.src = audioPath;
            audioPlayer.play();
        });
    });
</script>

</html>