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
    <title>Ajout Audio</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Define a common font family */
        body {
            font-family: Arial, sans-serif;
        }

        /* Style the container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Center align the form */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            padding: 20px;
        }

        /* Style labels */
        label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Style text inputs */
        input[type="text"],
        input[type="date"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        /* Style file input */
        input[type="file"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        /* Style the submit button */
        input[type="submit"] {
            background-color: #1DB954;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for the submit button */
        input[type="submit"]:hover {
            background-color: #168f48;
        }

        /* Style the cancel link */
        a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Ajout Audio</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="audio_name">Titre :</label>
            <input type="text" id="audio_name" name="audio_name" required>

            <label for="mp3file">Fichier MP3 :</label>
            <input type="file" id="mp3file" name="mp3file" accept=".mp3" required>

            <label for="audio_date">Date :</label>
            <input type="date" id="audio_date" name="audio_date" required>

            <input type="submit" value="Upload" name="upload_mp3">
            <a href="/ra/index.php">Cancel</a>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['mp3file'])) {
        $id = $_GET['id'];
        upload_file($id);
    }
    ?>
</body>

</html>