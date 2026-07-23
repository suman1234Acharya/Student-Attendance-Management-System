<?php
session_start();
include("../connection.php");

// Check Admin Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: ../login.php");
    exit();
}

$message = "";

if (isset($_POST['save'])) {

    $roll_no  = mysqli_real_escape_string($conn, $_POST['roll_no']);
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $gender   = mysqli_real_escape_string($conn, $_POST['gender']);
    $dob      = $_POST['dob'];
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $class_id = $_POST['class_id'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Upload Photo
    $photo = "";

    if (!empty($_FILES['photo']['name'])) {

        $photo = time() . "_" . $_FILES['photo']['name'];

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "../img/" . $photo
        );
    }

    $sql = "INSERT INTO students
    (roll_no,name,gender,dob,email,phone,address,class_id,photo,username,password)

    VALUES
    ('$roll_no','$name','$gender','$dob','$email','$phone','$address','$class_id','$photo','$username','$password')";

    if (mysqli_query($conn, $sql)) {
        $message = "<div class='alert alert-success'>Student Added Successfully.</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error : " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Add Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Add Student</h3>

</div>

<div class="card-body">

<?php echo $message; ?>

<form method="POST" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 mb-3">

<label>Roll Number</label>

<input
type="text"
name="roll_no"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Student Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Gender</label>

<select
name="gender"
class="form-control"
required>

<option value="">Select</option>
<option>Male</option>
<option>Female</option>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Date of Birth</label>

<input
type="date"
name="dob"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control">

</div>

<div class="col-md-12 mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"></textarea>

</div>

<div class="col-md-6 mb-3">

<label>Class</label>

<select
name="class_id"
class="form-control"
required>

<option value="">Select Class</option>

<?php

$result = mysqli_query($conn,"SELECT * FROM classes");

while($row=mysqli_fetch_assoc($result))
{

?>

<option value="<?php echo $row['id']; ?>">

<?php echo $row['class_name']; ?>

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

</div>

<div class="col-md-6 mb-3">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="col-md-12 mt-3">

<button
type="submit"
name="save"
class="btn btn-success">

Save Student

</button>

<a
href="manage_students.php"
class="btn btn-secondary">

Back

</a>

</div>

</div>

</form>

</div>

</div>

</div>

</body>
</html>
