<?php
$id = isset($_GET['id']) ? $_GET['id'] : 1;
echo $id;
// if (!$id || $id == null) {
//     header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ra/page/radio");
//     exit();
// }

$sql = "SELECT * FROM radio WHERE radio_id = $id";
$result = mysqli_query($db, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ra/404");
    exit();
}

// Array to store the fetched data

$data = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data = array_merge($row,$data);
    }
} else {
    echo "No data found.";
}
