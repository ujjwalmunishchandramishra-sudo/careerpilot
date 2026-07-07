<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>

<title>Profile</title>

<link rel="stylesheet"
href="css/profile.css">

</head>
<body>

<div class="profile-card">

<img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['full_name']); ?>&background=38bdf8&color=fff">

<h1><?php echo $user['full_name']; ?></h1>

<h3><?php echo ucfirst($user['role']); ?></h3>

<p>Email : <?php echo $user['email']; ?></p>

<p>DSA Solved : Coming Soon</p>

<?php
$appQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM applications WHERE user_id='$user_id'");
$appData = mysqli_fetch_assoc($appQuery);
?>

<p>Applications : <?php echo $appData['total']; ?></p>

<a href="edit_profile.php">
<button>
Edit Profile
</button>
</a>

</div>

<script src="js/profile.js"></script>

</body>
</html>