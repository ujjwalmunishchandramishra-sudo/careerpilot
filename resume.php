<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if(isset($_POST['upload'])){

    $user_id = $_SESSION['user_id'];

    $filename = $_FILES['resume']['name'];
    $tempname = $_FILES['resume']['tmp_name'];

    $folder = "uploads/".$filename;

    if(move_uploaded_file($tempname,$folder)){

        mysqli_query($conn,"DELETE FROM resumes WHERE user_id='$user_id'");

        mysqli_query($conn,"INSERT INTO resumes(user_id,resume)
        VALUES('$user_id','$filename')");

        echo "<script>alert('Resume Uploaded Successfully');</script>";

    }else{

        echo "<script>alert('Upload Failed');</script>";

    }

}
?>
<!DOCTYPE html>
<html>
<head>

<title>Resume Analyzer</title>

<link rel="stylesheet"
href="css/resume.css">

</head>

<body>

<h1>Resume Analyzer</h1>

<form method="POST" enctype="multipart/form-data">

<input
type="file"
name="resume"
accept=".pdf,.doc,.docx"
required>

<br><br>

<button type="submit" name="upload">
Upload Resume
</button>

</form>


<div class="result">

<h2>ATS Score</h2>

<div class="progress">

<div id="progressBar">

0%

</div>

</div>


<h2>Skills Found</h2>

<ul id="skillsList">

</ul>

<h2>Suggestions</h2>

<ul id="suggestions">

</ul>

</div>

<script src="js/resume.js"></script>

</body>
</html>