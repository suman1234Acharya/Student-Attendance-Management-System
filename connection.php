<?php
// Database Configuration
$host = "localhost";
$user = "root";
$password = "";
$database = "attendance";

// Create Connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check Connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Set Character Encoding
mysqli_set_charset($conn, "utf8");
?>
