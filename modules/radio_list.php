<?php
$sql = "SELECT * FROM radio";
$result = mysqli_query($db, $sql);

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$before = $id - 1;
$after = $id + 1;

if ($id == 1) {
    $before = mysqli_num_rows($result);
}
if ($id == mysqli_num_rows($result)) {
    $after = 1;
}




if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['radio_id'] == $id) {
            $currentRow = $row;
        }
        if ($row['radio_id'] == $before) {
            $beforeRow = $row;
        }
        if ($row['radio_id'] == $after) {
            $afterRow = $row;
        }
    }
}
echo "<div class='radio_list'>";
echo "<div class='radio_logo small' id='" . $beforeRow['radio_id'] . "'><img src='../../assets/radio_logo/logo---" . str_replace(' ', '-', $beforeRow['radio_name']) . ".png' alt=' srcset=' /></div>";
echo "<div class='radio_logo' id='" . $currentRow['radio_id'] . "'><img src='../../assets/radio_logo/logo---" . str_replace(' ', '-', $currentRow['radio_name']) . ".png' alt=' srcset=' /></div>";
echo "<div class='radio_logo small'  id='" . $afterRow['radio_id'] . "'><img src='../../assets/radio_logo/logo---" . str_replace(' ', '-', $afterRow['radio_name']) . ".png' alt=' srcset=' /></div>";
echo "</div>";

?>

<script>    
    // Get all div elements with the class "radio_logo"
    const radioLogos = document.querySelectorAll('.radio_logo');

    // Add click event listener to each div element
    radioLogos.forEach((radioLogo) => {
        radioLogo.addEventListener('click', () => {
            // Get the corresponding id from the data-id attribute
            const id = radioLogo.id;
            // Update the link with the new id
            var url = new URL(window.location.href);
            // Update the id parameter
            url.searchParams.set("id", id); // Change "2" to the desired new value

            // Replace the current URL with the updated one
            history.replaceState(null, null, url.toString());
            window.location.href = url.toString();
        });
    });
</script>