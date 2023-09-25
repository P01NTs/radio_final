<?php
include_once("../includes/functions.php");
session_start();

if (isset($_GET["id"])) {
    $ajouter = $_GET["id"];
}

$db = connect_to_database();

if (isset($_POST['upload_program'])) {
    $db = connect_to_database();

    $target_dir = "../assets/program_img/";
    $target_file = "";
    $new_file_name = "";
    $uploadOk = 1;

    $program_name = trim(mysqli_real_escape_string($db, $_POST["program_name"]));
    $program_description = mysqli_real_escape_string($db, $_POST["program_description"]);
    $target_file = $target_dir . basename($_FILES["program_img"]["name"]);
    $check = getimagesize($_FILES["program_img"]["tmp_name"]);
    $new_file_name = str_replace(' ', '_', $program_name) . ".jpg";

    if ($check === false) {
        echo "Sorry, only image files are allowed.";
        $uploadOk = 0;
    }

    // Allow certain file formats only
    $allowedFormats = ["jpg", "jpeg", "png"];
    if (!in_array(strtolower(pathinfo($target_file, PATHINFO_EXTENSION)), $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["program_img"]["tmp_name"], $target_dir . $new_file_name)) {
            $sql = "INSERT INTO `program` (program_name, program_description, radio_id)
                    VALUES ('$program_name', '$program_description', $ajouter)";

            $result = mysqli_query($db, $sql);
            if ($result) {
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($db);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter programme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 150px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 92%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            background-color: #1DB954;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #168f48;
        }
        form a {
            padding: 8px 10px;
            border-radius: 5px;
            background-color: red;
            color:white;
            margin-left: 200px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Ajouter programme</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="program_name">Program name:</label>
                <input type="text" name="program_name" id="program_name" required>
            </div>

            <div class="form-group">
                <label for="program_description">Program description:</label>
                <textarea name="program_description" id="program_description" required></textarea>
            </div>

            <div class="form-group">
                <label for="program_img">Program image:</label>
                <input type="file" name="program_img" accept=".jpg, .jpeg, .png" required>
            </div>

            <input type="submit" value="Add program" name="upload_program">
            <a href="/ra/index.php">Cancel</a>

        </form>
    </div>
</body>
<script>
    document.querySelector(".cancelButton").addEventListener("click", function() {
        console.log("hi")
        window.location.href = "localhost/ra/"; // Replace "home.php" with the actual URL of your home page
        // window.location.replace("localhost/ra/")
    });
</script>

</html>