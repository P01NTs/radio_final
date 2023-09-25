<?php
include_once "../../includes/functions.php";

$param1 = $_GET['id'];

$db = connect_to_database();

$sql = "SELECT * from radio where radio_id = $param1";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    echo $row['radio_name'];
}
