<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="./pages/radio/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
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
    </style>
</head>

<body>
    <?php
    include "./includes/header.php";
    ?>
    <div class="container">
        <h1>Contactez-nous</h1>
        <form action="process_contact.php" method="POST">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Adresse e-mail :</label>
            <input type="email" name="email" id="email" required>

            <label for="message">Message :</label>
            <textarea name="message" id="message" required></textarea>

            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>

</html>