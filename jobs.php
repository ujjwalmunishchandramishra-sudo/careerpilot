<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM jobs ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Available Jobs</title>


<link rel="stylesheet" href="css/jobs.css">
</head>

<body>

<div class="container">

<div class="page-header">

    <div>

        <h1>💼 Available Jobs</h1>

        <p style="color:#94a3b8;margin-top:8px;">
            Find your next internship or dream job.
        </p>

    </div>

    <div class="search-box">

        <input
        type="text"
        placeholder="🔍 Search jobs...">

    </div>

</div>

<div class="jobs-grid">

<?php
if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){
?>

<div class="job-card">

<div class="company">
🏢 <?php echo $row['company']; ?>
</div>

<h2 class="job-title">
<?php echo $row['title']; ?>
</h2>

<div class="badges">

<span class="badge">
📍 <?php echo $row['location']; ?>
</span>

<span class="badge">
💰 <?php echo $row['salary']; ?>
</span>

</div>

<p class="job-desc">

<?php echo substr($row['description'],0,180); ?>...

</p>

<?php
$job_id = $row['id'];
$user_id = $_SESSION['user_id'];

// check if already applied
$check = mysqli_query($conn, "SELECT * FROM applications WHERE user_id='$user_id' AND job_id='$job_id'");
$applied = mysqli_num_rows($check) > 0;

if($applied){
?>

<button class="applied-btn" disabled>
✅ Already Applied
</button>

<?php } else { ?>

<a
href="apply.php?id=<?php echo $row['id']; ?>"
class="apply-btn">

🚀 Apply Now

</a>

<?php } ?>
</div>



<?php

}

}else{

echo "<div class='alert alert-warning'>No jobs available.</div>";

}

?>
</div>

<a href="dashboard.php" class="back-btn">
← Back to Dashboard
</a>
</div>

</body>
</html>
