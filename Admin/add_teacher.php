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

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Upload Photo
    $photo = "";

    if (!empty($_FILES['photo']['name'])) {

        $photo = time() . "_" . basename($_FILES['photo']['name']);

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "../img/" . $photo
        );
    }

    $sql = "INSERT INTO teachers
    (name,department,qualification,email,phone,photo,username,password)

    VALUES
    ('$name','$department','$qualification','$email','$phone','$photo','$username','$password')";

    if (mysqli_query($conn, $sql)) {

        $message = "<div class='alert alert-success'>
        Teacher Added Successfully.
        </div>";

    } else {

        $message = "<div class='alert alert-danger'>
        Error : ".mysqli_error($conn)."
        </div>";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Add Teacher</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Add Teacher</h3>

</div>

<div class="card-body">

<?php echo $message; ?>

<form method="POST" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 mb-3">

<label>Teacher Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Department</label>

<input
type="text"
name="department"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Qualification</label>

<input
type="text"
name="qualification"
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

<div class="col-md-12">

<button
type="submit"
name="save"
class="btn btn-success">

Save Teacher

</button>

<a
href="manage_teachers.php"
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
