<?php
session_start();
include("../connection.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_teachers.php");
    exit();
}

$id = intval($_GET['id']);

$result = mysqli_query($conn,"SELECT * FROM teachers WHERE id='$id'");

if(mysqli_num_rows($result)==0){
    header("Location: manage_teachers.php");
    exit();
}

$teacher = mysqli_fetch_assoc($result);

// Delete Teacher Photo
if($teacher['photo']!=""){

    $file="../img/".$teacher['photo'];

    if(file_exists($file)){
        unlink($file);
    }

}

// Delete Teacher Record
mysqli_query($conn,"DELETE FROM teachers WHERE id='$id'");

header("Location: manage_teachers.php?deleted=1");
exit();
?>
