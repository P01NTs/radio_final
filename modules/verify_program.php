<?php
$id = isset($_GET['id']) ? $_GET['id'] : 1;

mysqli_set_charset($db, "utf8mb4");
$sql = "SELECT program.*, radio.* FROM program INNER JOIN radio ON program.radio_id = radio.radio_id WHERE program_id = $id";
$result = mysqli_query($db, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ra/404");
    exit();
}

// Array to store the fetched data

$data = array();

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $data = $row;
} else {
    echo "No data found.";
}
