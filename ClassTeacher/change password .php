<?php
session_start();
include("../connection.php");

// Check Teacher Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "Teacher") {
    header("Location: ../login.php");
    exit();
}

$message = "";

$user_id = $_SESSION['user_id'];

if(isset($_POST['change'])){

    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Get Current Password From Database
    $result = mysqli_query($conn,"SELECT * FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_assoc($result);

    if(password_verify($current_password,$user['password'])){

        if($new_password == $confirm_password){

            $hash = password_hash($new_password,PASSWORD_DEFAULT);

            mysqli_query($conn,"
            UPDATE users
            SET password='$hash'
            WHERE id='$user_id'
            ");

            $message = "<div class='alert alert-success'>
            Password Changed Successfully.
            </div>";

        }else{

            $message = "<div class='alert alert-danger'>
            New Password and Confirm Password do not match.
            </div>";

        }

    }else{

        $message = "<div class='alert alert-danger'>
        Current Password is incorrect.
        </div>";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Change Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Change Password</h3>

</div>

<div class="card-body">

<?php echo $message; ?>

<form method="POST">

<div class="mb-3">

<label>Current Password</label>

<input
type="password"
name="current_password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>New Password</label>

<input
type="password"
name="new_password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input
type="password"
name="confirm_password"
class="form-control"
required>

</div>

<button
type="submit"
name="change"
class="btn btn-success">

Change Password

</button>

<a
href="dashboard.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>
