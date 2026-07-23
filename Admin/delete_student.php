<?php
session_start();
include("../connection.php");

// Check Admin Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: ../login.php");
    exit();
}

// Check Student ID
if (!isset($_GET['id'])) {
    header("Location: manage_students.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch Student Details
$result = mysqli_query($conn, "SELECT * FROM students WHERE id='$id'");

if (mysqli_num_rows($result) == 0) {
    header("Location: manage_students.php");
    exit();
}

$student = mysqli_fetch_assoc($result);

// Delete Student Photo
if (!empty($student['photo'])) {

    $photoPath = "../img/" . $student['photo'];

    if (file_exists($photoPath)) {
        unlink($photoPath);
    }
}

// Delete Student Record
$sql = "DELETE FROM students WHERE id='$id'";

if (mysqli_query($conn, $sql)) {

    header("Location: manage_students.php?deleted=1");
    exit();

} else {

    echo "Error deleting student: " . mysqli_error($conn);

}
?>
