<?php

function display_programe($id)
{
    $db = connect_to_database();
    $db->set_charset("utf8mb4"); // Set the desired character set
    $sql = "SELECT * FROM program WHERE radio_id = $id ";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $counter = 0;
        // Loop through each row and display data in cards
        while ($row = mysqli_fetch_assoc($result)) {
            if ($counter >= 4) {
                break;
            };
            if ($counter == 0) {
                echo    "<a href='/ra/pages/program/?id=".$row['program_id']."' class='big-card'>
                            <img src='./assets/program_img/" . trim($row['program_name']) . ".jpg'/>
                            <div class='card-title'>" . $row['program_name'] . "</div>
                        </a><div class='card-list'>";
            } else {
                echo    "<a href='/ra/pages/program/?id=".$row['program_id']."' class='card'>
                            <img src='./assets/program_img/" . trim($row['program_name']) . ".jpg'/>
                            <div class='card-content'>
                                <div class='card-title'>" . $row['program_name'] . "</div>
                                <div class='card-description'>" . $row['program_description'] . "</div>
                            </div>
                        </a>";
            }
            $counter++;
        }
    } else {
        echo "No data available.";
    }
    echo "</div>";
};
