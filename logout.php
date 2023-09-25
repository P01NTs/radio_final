<?php
session_start();
include_once("./includes/functions.php");
$db = connect_to_database();
if (isset($_SESSION['login_token'])) {
    $sql = "SELECT * FROM `admin` WHERE is_superadmin = 1";
    $email = $_SESSION['login_token'];
    $result = mysqli_query($db, $sql);

    if ($result) {
        $superAdminEmails = array();

        // Fetch the super admin emails and store them in an array
        while ($row = $result->fetch_assoc()) {
            $superAdminEmails[] = $row['admin_email'];
        }

        // Check if $email is in the list of super admin emails
        if (!in_array($email, $superAdminEmails)) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ra");
            exit();
        }
    } else {
        // Handle the database query error
        echo "Error: " . $mysqli->error;
    }
} else {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ra");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form id="myForm" action="" method="post">

        <label for="admin_name">Admin name :</label>
        <input type="text" name="admin_name" id="admin_name">

        <br>

        <label for="admin_email">Admin email :</label>
        <input type="email" name="admin_email" id="admin_email">

        <br>

        <label for="admin_password">Admin password :</label>
        <input type="password" name="admin_password" id="admin_password" class="admin_password">
        <span id="password_error"></span>
        <br>
        <input type="submit" value="Create account" name="add_admin">
        <br>
        <br>
        <a href="/ra/index.php">Annuler</a>
        <?php
        if (isset($_POST['add_admin'])) {
            add_admin();
        }
        ?>
    </form>
    <hr>
    <?php show_admins(); ?>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }


    // registration password check
    document.getElementById('myForm').addEventListener('submit', function(event) {

        var passwordInput = document.getElementById('admin_password');
        var password = passwordInput.value;
        var passwordErrorSpan = document.getElementById('password_error')

        if (password.length < 8 || !/[A-Z]/.test(password) || !/[.!@#$%^&*]/.test(password)) {
            passwordErrorSpan.innerText = 'Password must be at least 8 characters long, contain at least one uppercase letter, and one special character.'
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .form-container {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 300px;
        text-align: center;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 5px 0;
    }

    .admin_password {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 5px 0;
    }

    #password_error {
        color: red;
    }

    input[type="submit"],a {
        background-color: #1DB954;
        color: #fff;
        border: none;
        padding: 10px 0;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
        text-decoration: none;
    }
    a{
        background-color: red !important;
    }
    a:hover{
        background-color: ff11111;
    }
    input[type="submit"]:hover {
        background-color: #168f48;
    }
</style>

</html>