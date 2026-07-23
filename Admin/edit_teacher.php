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
    die("Teacher not found.");
}

$teacher = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $department = mysqli_real_escape_string($conn,$_POST['department']);
    $qualification = mysqli_real_escape_string($conn,$_POST['qualification']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);

    $photo = $teacher['photo'];

    if(!empty($_FILES['photo']['name'])){

        $photo = time().'_'.basename($_FILES['photo']['name']);

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "../img/".$photo
        );
    }

    $sql="UPDATE teachers SET

    name='$name',
    department='$department',
    qualification='$qualification',
    email='$email',
    phone='$phone',
    photo='$photo'

    WHERE id='$id'";

    if(mysqli_query($conn,$sql)){

        header("Location: manage_teachers.php?updated=1");
        exit();

    }else{

        echo mysqli_error($conn);

    }
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit Teacher</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>Edit Teacher</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?php echo $teacher['name'];?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Department</label>

<input
type="text"
name="department"
class="form-control"
value="<?php echo $teacher['department'];?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Qualification</label>

<input
type="text"
name="qualification"
class="form-control"
value="<?php echo $teacher['qualification'];?>">

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo $teacher['email'];?>">

</div>

<div class="col-md-6 mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?php echo $teacher['phone'];?>">

</div>

<div class="col-md-6 mb-3">

<label>Photo</label>

<input
type="file"
name="photo"
class="form-control">

<br>

<?php
if($teacher['photo']!=""){
?>

<img
src="../img/<?php echo $teacher['photo'];?>"
width="120">

<?php
}
?>

</div>

<div class="col-md-12">

<button
type="submit"
name="update"
class="btn btn-primary">

Update Teacher

</button>

<a
href="manage_teachers.php"
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
