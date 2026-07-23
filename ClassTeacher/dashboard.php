<?php
session_start();
include("../connection.php");

// Check Teacher Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "Teacher") {
    header("Location: ../login.php");
    exit();
}

$teacher_id = $_SESSION['user_id'];
$today = date("Y-m-d");

// Total Students
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM students");
$totalStudents = mysqli_fetch_assoc($result)['total'];

// Present Today
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM attendance WHERE teacher_id='$teacher_id' AND date='$today' AND status='Present'");
$present = mysqli_fetch_assoc($result)['total'];

// Absent Today
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM attendance WHERE teacher_id='$teacher_id' AND date='$today' AND status='Absent'");
$absent = mysqli_fetch_assoc($result)['total'];

$totalAttendance = $present + $absent;
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Teacher Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.card{
    border:none;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.15);
}

.navbar-brand{
    font-weight:bold;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-success">

<div class="container-fluid">

<span class="navbar-brand">

Student Attendance Management System

</span>

<div>

Welcome,

<b><?php echo $_SESSION['username']; ?></b>

<a href="../logout.php" class="btn btn-light btn-sm ms-3">

Logout

</a>

</div>

</div>

</nav>

<div class="container mt-4">

<h2>Teacher Dashboard</h2>

<div class="row mt-4">

<div class="col-md-3">

<div class="card bg-primary text-white">

<div class="card-body">

<h5>Total Students</h5>

<h2><?php echo $totalStudents; ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-success text-white">

<div class="card-body">

<h5>Today's Attendance</h5>

<h2><?php echo $totalAttendance; ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-info text-white">

<div class="card-body">

<h5>Present</h5>

<h2><?php echo $present; ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-danger text-white">

<div class="card-body">

<h5>Absent</h5>

<h2><?php echo $absent; ?></h2>

</div>

</div>

</div>

</div>

<div class="card mt-5">

<div class="card-header bg-dark text-white">

Recent Attendance

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-secondary">

<tr>

<th>ID</th>

<th>Student</th>

<th>Class</th>

<th>Date</th>

<th>Status</th>

</tr>

</thead>

<tbody>

<?php

$sql = mysqli_query($conn,"
SELECT
attendance.id,
students.name,
classes.class_name,
attendance.date,
attendance.status

FROM attendance

JOIN students
ON attendance.student_id = students.id

JOIN classes
ON attendance.class_id = classes.id

WHERE attendance.teacher_id='$teacher_id'

ORDER BY attendance.date DESC

LIMIT 10
");

while($row = mysqli_fetch_assoc($sql))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['class_name']; ?></td>

<td><?php echo $row['date']; ?></td>

<td>

<?php

if($row['status']=="Present")
{
echo "<span class='badge bg-success'>Present</span>";
}
else
{
echo "<span class='badge bg-danger'>Absent</span>";
}

?>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

<div class="row mt-4">

<div class="col-md-12">

<a href="take_attendance.php" class="btn btn-success">
Take Attendance
</a>

<a href="attendance_history.php" class="btn btn-primary">
Attendance History
</a>

<a href="view_students.php" class="btn btn-info text-white">
View Students
</a>

<a href="reports.php" class="btn btn-warning">
Reports
</a>

<a href="profile.php" class="btn btn-secondary">
Profile
</a>

</div>

</div>

</div>

</body>

</html>
