<?php
session_start();
include("../connection.php");

// Check Teacher Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "Teacher") {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: attendance_history.php");
    exit();
}

$id = intval($_GET['id']);
$teacher_id = $_SESSION['user_id'];

// Fetch Attendance Record
$query = mysqli_query($conn,"
SELECT attendance.*, students.name, classes.class_name
FROM attendance
JOIN students ON attendance.student_id = students.id
JOIN classes ON attendance.class_id = classes.id
WHERE attendance.id='$id'
AND attendance.teacher_id='$teacher_id'
");

if(mysqli_num_rows($query)==0){
    die("Attendance record not found.");
}

$row = mysqli_fetch_assoc($query);

// Update Attendance
if(isset($_POST['update'])){

    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $date = $_POST['date'];

    $update = mysqli_query($conn,"
    UPDATE attendance
    SET
    status='$status',
    date='$date'
    WHERE id='$id'
    ");

    if($update){
        header("Location: attendance_history.php?updated=1");
        exit();
    }else{
        $error = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Edit Attendance</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">
<h3>Edit Attendance</h3>
</div>

<div class="card-body">

<?php
if(isset($error)){
    echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Student Name</label>
<input
type="text"
class="form-control"
value="<?php echo htmlspecialchars($row['name']); ?>"
readonly>
</div>

<div class="mb-3">
<label>Class</label>
<input
type="text"
class="form-control"
value="<?php echo htmlspecialchars($row['class_name']); ?>"
readonly>
</div>

<div class="mb-3">
<label>Date</label>
<input
type="date"
name="date"
class="form-control"
value="<?php echo $row['date']; ?>"
required>
</div>

<div class="mb-3">
<label>Status</label>

<select
name="status"
class="form-control"
required>

<option value="Present"
<?php if($row['status']=="Present") echo "selected"; ?>>
Present
</option>

<option value="Absent"
<?php if($row['status']=="Absent") echo "selected"; ?>>
Absent
</option>

</select>

</div>

<button
type="submit"
name="update"
class="btn btn-primary">
Update Attendance
</button>

<a
href="attendance_history.php"
class="btn btn-secondary">
Cancel
</a>

</form>

</div>

</div>

</div>

</body>
</html>
