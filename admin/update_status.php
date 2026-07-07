<?php
session_start();
include "../db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['role'] != "admin") {
    die("Access Denied!");
}

if (!isset($_GET['id']) || !isset($_GET['status'])) {
    die("Missing parameters");
}

$id = intval($_GET['id']);
$status = $_GET['status'];

// Debug (temporary)
// echo $id . " - " . $status;

$sql = "UPDATE applications SET status='$status' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: applications.php");
    exit();
} else {
    echo "Update Failed: " . mysqli_error($conn);
}
?>