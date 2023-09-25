<?php
// Connect to the database
$db = mysqli_connect('localhost', "root", "", "myradio");

// Check for connection errors
if (mysqli_connect_errno()) {
    // Display an error message if the connection fails
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

// Return the database connection
return $db;
