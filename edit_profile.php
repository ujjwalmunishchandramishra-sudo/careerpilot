<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    mysqli_query($conn,
    "UPDATE users
    SET full_name='$full_name',
        email='$email'
    WHERE id='$user_id'");

    $_SESSION['full_name'] = $full_name;

    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Profile</title>

<link rel="stylesheet" href="css/profile.css">

</head>

<body>

<div class="profile-card">

<h2>Edit Profile</h2>

<form method="POST">

<input
type="text"
name="full_name"
value="<?php echo $user['full_name']; ?>"
required>

<br><br>

<input
type="email"
name="email"
value="<?php echo $user['email']; ?>"
required>

<br><br>

<button
type="submit"
name="update">

Save Changes

</button>

</form>

<br>

<a href="profile.php">

<button>

Cancel

</button>

</a>

</div>

</body>
</html>