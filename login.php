<?php
session_start();
include('connection.php');

if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password']))
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            if($row['role']=="Admin")
            {
                header("Location: Admin/dashboard.php");
            }
            else
            {
                header("Location: ClassTeacher/dashboard.php");
            }
            exit();
        }
        else
        {
            $error = "Invalid Password!";
        }
    }
    else
    {
        $error = "Invalid Username!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Student Attendance System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}
.login-box{
    width:400px;
    margin:80px auto;
}
.card{
    border:none;
    box-shadow:0 0 20px rgba(0,0,0,.1);
}
</style>

</head>

<body>

<div class="login-box">

<div class="card">

<div class="card-header bg-primary text-white text-center">
<h3>Student Attendance System</h3>
</div>

<div class="card-body">

<?php
if(isset($error))
{
    echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Username</label>
<input
type="text"
name="username"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Password</label>
<input
type="password"
name="password"
class="form-control"
required>
</div>

<div class="d-grid">
<button
type="submit"
name="login"
class="btn btn-primary">
Login
</button>
</div>

</form>

</div>

</div>

</div>

</body>
</html>
