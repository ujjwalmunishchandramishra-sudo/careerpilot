<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT applications.*, jobs.title, jobs.company
        FROM applications
        INNER JOIN jobs ON applications.job_id = jobs.id
        WHERE applications.user_id = '$user_id'
        ORDER BY applications.applied_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Applications</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2 class="mb-4">📄 My Applications</h2>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>Job Title</th>

<th>Company</th>

<th>Status</th>

<th>Applied On</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['company']; ?></td>

<td><?php echo $row['status']; ?></td>

<td><?php echo $row['applied_at']; ?></td>

</tr>

<?php

}

}else{

echo "<tr><td colspan='4'>No Applications Found.</td></tr>";

}

?>

</tbody>

</table>

<a href="dashboard.php" class="btn btn-primary">

← Back to Dashboard

</a>

</div>

</body>
</html>