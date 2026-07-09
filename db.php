<?php

$host = "YOUR_HOST";
$user = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$database = "YOUR_DATABASE";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed");
}

?>