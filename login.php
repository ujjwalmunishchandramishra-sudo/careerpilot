<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == "admin") {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();

        } else {
            echo "<script>alert('Incorrect Password');</script>";
        }

    } else {
        echo "<script>alert('Email not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CareerPilot</title>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container">

    <div class="form-box">

        <h1>Welcome Back</h1>
        <p>Login to continue</p>

        <form method="POST">

            <input
            type="email"
            name="email"
            placeholder="Email"
            id="email"
            required>

            <div class="password-box">

                <input
                type="password"
                name="password"
                placeholder="Password"
                id="password"
                required>

                <span id="togglePassword">
                    👁
                </span>

            </div>

            <button type="submit" name="login">
                Login
            </button>

            <p>
                Don't have an account?
                <a href="register.php">
                    Sign Up
                </a>
            </p>

        </form>

    </div>

</div>

<script src="js/login.js"></script>

</body>
</html>