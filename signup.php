<?php
session_start();
include "db.php";

if (isset($_POST['register'])) {

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {

        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($check) > 0) {

            echo "<script>alert('Email already exists!');</script>";

        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = $_POST['role'];
            $sql = "INSERT INTO users(full_name,email,password,role)
            VALUES('$full_name','$email','$hashed_password','$role')";
            if (mysqli_query($conn, $sql)) {

                echo "<script>
                alert('Registration Successful!');
                window.location='login.php';
                </script>";

            } else {

                echo "<script>alert('Registration Failed!');</script>";

            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - CareerPilot</title>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container">

<div class="form-box">

<h1>Create Account</h1>

<form method="POST">

<input
type="text"
name="full_name"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email"
required>

<input
type="password"
name="password"
placeholder="Password"
id="password"
required>

<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
id="confirmPassword"
required>


<!-- ROLE SELECTION -->
<label class="role-title">Select Role</label>

<div class="role-container">

    <label class="role-card">
        <input type="radio" name="role" value="student" checked>

        <div class="role-box">
            <div class="icon">🎓</div>
            <h3>Student</h3>
            <p>Find jobs & build career</p>
        </div>
    </label>

    <label class="role-card">
        <input type="radio" name="role" value="admin">

        <div class="role-box">
            <div class="icon">💼</div>
            <h3>Admin</h3>
            <p>Post jobs & hire talent</p>
        </div>
    </label>

</div>
<br><br>

<button type="submit" name="register">
Create Account
</button>

<p>
Already have an account?
<a href="login.php">
Login
</a>
</p>

</form>

</div>

</div>

<script src="js/login.js"></script>

</body>
</html>