<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$job_id = $_GET['id'];

// Check if already applied
$check = mysqli_query($conn, "SELECT * FROM applications WHERE user_id='$user_id' AND job_id='$job_id'");

if (mysqli_num_rows($check) > 0) {
    echo "<h2 style='color:red;'>⚠️ You have already applied for this job.</h2>";
    echo "<a href='jobs.php'>Go Back</a>";
    exit();
}

// Insert application
$sql = "INSERT INTO applications (user_id, job_id, status, applied_at)
VALUES ('$user_id', '$job_id', 'Pending', NOW())";

if (mysqli_query($conn, $sql)) {
    echo "<h2 style='color:green;'>🎉 Application Submitted Successfully!</h2>";
    echo "<a href='jobs.php'>Go Back</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>