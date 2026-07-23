<?php
session_start();
include("../connection.php");

// Check Teacher Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "Teacher") {
    header("Location: ../login.php");
    exit();
}

$teacher_id = $_SESSION['user_id'];
$message = "";

// Save Attendance
if(isset($_POST['save'])){

    $class_id = intval($_POST['class_id']);
    $date = $_POST['date'];

    foreach($_POST['status'] as $student_id => $status){

        $student_id = intval($student_id);
        $status = mysqli_real_escape_string($conn,$status);

        // Check Duplicate
        $check = mysqli_query($conn,"
        SELECT id FROM attendance
        WHERE
        student_id='$student_id'
        AND date='$date'
        ");

        if(mysqli_num_rows($check)==0){

            mysqli_query($conn,"
            INSERT INTO attendance
            (
                student_id,
                class_id,
                teacher_id,
                date,
                status
            )
            VALUES
            (
                '$student_id',
                '$class_id',
                '$teacher_id',
                '$date',
                '$status'
            )
            ");

        }

    }

    $message="<div class='alert alert-success'>
    Attendance Saved Successfully.
    </div>";
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Take Attendance</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Take Attendance</h3>

</div>

<div class="card-body">

<?php echo $message; ?>

<form method="POST">

<div class="row">

<div class="col-md-4">

<label>Class</label>

<select
name="class_id"
class="form-control"
required>

<option value="">Select Class</option>

<?php

$class=mysqli_query($conn,"SELECT * FROM classes");

while($c=mysqli_fetch_assoc($class))
{
?>

<option value="<?php echo $c['id']; ?>">

<?php echo $c['class_name']; ?>

</option>

<?php
}
?>

</select>

</div>

<div class="col-md-4">

<label>Date</label>

<input
type="date"
name="date"
class="form-control"
value="<?php echo date('Y-m-d');?>"
required>

</div>

<div class="col-md-4">

<br>

<button
type="submit"
name="load"
class="btn btn-primary mt-2">

Load Students

</button>

</div>

</div>

<?php

if(isset($_POST['load'])){

$class_id=intval($_POST['class_id']);

$students=mysqli_query($conn,"
SELECT *
FROM students
WHERE class_id='$class_id'
");

?>

<hr>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>Roll No</th>

<th>Name</th>

<th>Present</th>

<th>Absent</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($students))
{

?>

<tr>

<td><?php echo $row['roll_no']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>

<input
type="radio"
name="status[<?php echo $row['id'];?>]"
value="Present"
checked>

</td>

<td>

<input
type="radio"
name="status[<?php echo $row['id'];?>]"
value="Absent">

</td>

</tr>

<?php
}
?>

</tbody>

</table>

<input
type="hidden"
name="class_id"
value="<?php echo $class_id; ?>">

<input
type="hidden"
name="date"
value="<?php echo $_POST['date']; ?>">

<button
type="submit"
name="save"
class="btn btn-success">

Save Attendance

</button>

<?php
}
?>

<a
href="dashboard.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>

</html>
