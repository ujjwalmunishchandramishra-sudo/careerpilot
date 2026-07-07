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

if (isset($_POST['add_job'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
$company = mysqli_real_escape_string($conn, $_POST['company']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$salary = mysqli_real_escape_string($conn, $_POST['salary']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "INSERT INTO jobs(title, company, location, salary, description)
            VALUES('$title','$company','$location','$salary','$description')";

    if (mysqli_query($conn, $sql)) {
        $message = "Job added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Job</title>

<link rel="stylesheet" href="../css/admin.css">



</head>
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

<h1>💼 Add New Job</h1>

<p class="subtitle">
Create a new job opportunity for students.
</p>

<?php
if(isset($message)){
echo "<div class='success-msg'>$message</div>";
}
?>

<div class="form-card">

<form method="POST">

<label>Job Title</label>
<input type="text" name="title" required>

<label>Company Name</label>
<input type="text" name="company" required>

<label>Location</label>
<input type="text" name="location" required>

<label>Salary</label>
<input type="text" name="salary">

<label>Description</label>

<textarea
name="description"
rows="6"></textarea>

<button
type="submit"
name="add_job"
class="submit-btn">

➕ Publish Job

</button>

</form>

</div>

</div>

</body>
</html>