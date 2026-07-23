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
    die("Student not found.");
}

$student = mysqli_fetch_assoc($result);

// Update Student
if (isset($_POST['update'])) {

    $roll_no  = mysqli_real_escape_string($conn, $_POST['roll_no']);
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $gender   = mysqli_real_escape_string($conn, $_POST['gender']);
    $dob      = $_POST['dob'];
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $class_id = intval($_POST['class_id']);

    $photo = $student['photo'];

    // Upload New Photo
    if (!empty($_FILES['photo']['name'])) {

        $photo = time() . "_" . basename($_FILES['photo']['name']);

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "../img/" . $photo
        );
    }

    $sql = "UPDATE students SET

        roll_no='$roll_no',
        name='$name',
        gender='$gender',
        dob='$dob',
        email='$email',
        phone='$phone',
        address='$address',
        class_id='$class_id',
        photo='$photo'

        WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        header("Location: manage_students.php?updated=1");
        exit();

    } else {

        $error = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Edit Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">
<h3>Edit Student</h3>
</div>

<div class="card-body">

<?php
if(isset($error)){
    echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 mb-3">
<label>Roll Number</label>
<input type="text" name="roll_no" class="form-control"
value="<?php echo htmlspecialchars($student['roll_no']); ?>" required>
</div>

<div class="col-md-6 mb-3">
<label>Student Name</label>
<input type="text" name="name" class="form-control"
value="<?php echo htmlspecialchars($student['name']); ?>" required>
</div>

<div class="col-md-6 mb-3">
<label>Gender</label>

<select name="gender" class="form-control">

<option value="Male"
<?php if($student['gender']=="Male") echo "selected"; ?>>
Male
</option>

<option value="Female"
<?php if($student['gender']=="Female") echo "selected"; ?>>
Female
</option>

</select>

</div>

<div class="col-md-6 mb-3">
<label>Date of Birth</label>

<input type="date"
name="dob"
class="form-control"
value="<?php echo $student['dob']; ?>">

</div>

<div class="col-md-6 mb-3">
<label>Email</label>

<input type="email"
name="email"
class="form-control"
value="<?php echo htmlspecialchars($student['email']); ?>">

</div>

<div class="col-md-6 mb-3">
<label>Phone</label>

<input type="text"
name="phone"
class="form-control"
value="<?php echo htmlspecialchars($student['phone']); ?>">

</div>

<div class="col-md-12 mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"><?php echo htmlspecialchars($student['address']); ?></textarea>

</div>

<div class="col-md-6 mb-3">

<label>Class</label>

<select name="class_id" class="form-control">

<?php

$class = mysqli_query($conn,"SELECT * FROM classes");

while($row=mysqli_fetch_assoc($class))
{
?>

<option value="<?php echo $row['id']; ?>"

<?php
if($row['id']==$student['class_id'])
echo "selected";
?>

>

<?php echo htmlspecialchars($row['class_name']); ?>

</option>

<?php
}
?>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Photo</label>

<input
type="file"
name="photo"
class="form-control">

<br>

<?php
if(!empty($student['photo']))
{
?>

<img
src="../img/<?php echo htmlspecialchars($student['photo']); ?>"
width="120"
class="img-thumbnail">

<?php
}
?>

</div>

<div class="col-md-12">

<button
type="submit"
name="update"
class="btn btn-primary">

Update Student

</button>

<a
href="manage_students.php"
class="btn btn-secondary">

Cancel

</a>

</div>

</div>

</form>

</div>

</div>

</div>

</body>
</html>
