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

$sql = "SELECT applications.*, users.full_name, users.email, jobs.title, jobs.company
        FROM applications
        INNER JOIN users ON applications.user_id = users.id
        INNER JOIN jobs ON applications.job_id = jobs.id
        ORDER BY applications.applied_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Applications</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>

<body>

<div class="sidebar">

    <div class="profile">

        <div class="avatar">👨‍💼</div>

        <h2>CareerPilot</h2>

        <h3><?php echo $_SESSION['full_name']; ?></h3>

        <p>Administrator</p>

    </div>

    <ul>

        <li><a href="dashboard.php">🏠 Dashboard</a></li>

        <li><a href="add_job.php">💼 Add Job</a></li>

        <li><a href="applications.php">📋 Applications</a></li>

        <li><a href="../logout.php">🚪 Logout</a></li>

    </ul>

</div>

<div class="main">

<h2>📄 Student Applications</h2>

<table class="application-table">

<thead class="table-dark">
<tr>
<th>Student Name</th>
<th>Email</th>
<th>Job Title</th>
<th>Company</th>
<th>Status</th>
<th>Action</th>
<th>Applied On</th>
</tr>
</thead>

<tbody>

<?php
while($row = mysqli_fetch_assoc($result)) {
?>

<tr>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['company']; ?></td>
<td>

<?php

if($row['status']=="Accepted"){

echo "<span class='status accepted'>Accepted</span>";

}
elseif($row['status']=="Rejected"){

echo "<span class='status rejected'>Rejected</span>";

}
else{

echo "<span class='status pending'>Pending</span>";

}

?>

</td>

<td>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Accepted"
class="accept-btn">

Accept

</a>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected"
class="reject-btn">

Reject

</a>

</td>
<td><?php echo $row['applied_at']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>

<a href="dashboard.php" class="back-btn">← Back to Dashboard</a>

</div>

</body>
</html>