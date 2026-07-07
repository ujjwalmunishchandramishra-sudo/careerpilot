<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['role'] != 'admin') {
    die("Access Denied! Only Admin can access this page.");
}

include "../db.php";

// Total Jobs
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM jobs");
$total_jobs = mysqli_fetch_assoc($result)['total'];

// Total Students
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='student'");
$total_students = mysqli_fetch_assoc($result)['total'];

// Total Applications
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM applications");
$total_applications = mysqli_fetch_assoc($result)['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CareerPilot - Admin Dashboard</title>

<link rel="stylesheet" href="../css/dashboard.css">


</head>

<body>

<div class="sidebar">

    <div style="text-align:center;">

        <div style="
        width:80px;
        height:80px;
        border-radius:50%;
        background:#38bdf8;
        margin:auto;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:40px;">

            👨‍💼

        </div>

        <h2 style="margin-top:20px;">CareerPilot</h2>

        <h3 style="margin-top:25px;">
            <?php echo $_SESSION['full_name']; ?>
        </h3>

        <p style="color:#94a3b8;">
            Administrator
        </p>

    </div>

    <ul>

        <li>
            <a href="dashboard.php">
                🏠 Dashboard
            </a>
        </li>

        <li>
            <a href="add_job.php">
                💼 Add Job
            </a>
        </li>

        <li>
            <a href="applications.php">
                📋 Applications
            </a>
        </li>

        <li>
            <a href="#">
                👥 Students
            </a>
        </li>

        <li>
            <a href="#">
                📊 Reports
            </a>
        </li>

        <li>
            <a href="#">
                ⚙ Settings
            </a>
        </li>

        <li>
            <a href="../logout.php">
                🚪 Logout
            </a>
        </li>

    </ul>

</div>

<div class="main">

    <!-- Top Bar -->

    <div class="topbar">

        <div>

            <h1>
                Welcome, <?php echo $_SESSION['full_name']; ?> 👋
            </h1>

            <p style="color:#94a3b8;margin-top:5px;">
                Manage jobs, students and applications.
            </p>

        </div>

        <button id="darkBtn">
            🌙 Dark Mode
        </button>

    </div>


    <!-- Cards -->

    <div class="cards">

        <div class="card">
            <h3>💼 Total Jobs</h3>
            <h1><?php echo $total_jobs; ?></h1>
            <p>Jobs Posted</p>
        </div>

        <div class="card">
            <h3>👨‍🎓 Students</h3>
            <h1><?php echo $total_students; ?></h1>
            <p>Registered Students</p>
        </div>

        <div class="card">
            <h3>📋 Applications</h3>
            <h1><?php echo $total_applications; ?></h1>
            <p>Total Applications</p>
        </div>

        <div class="card">
            <h3>📈 Hiring</h3>
            <h1>Active</h1>
            <p>Recruitment Status</p>
        </div>

    </div>


    <!-- Bottom Section -->

    <div class="charts">

        <!-- Left -->

        <div class="chart-box">

            <h2 style="margin-bottom:20px;">
                📈 Application Overview
            </h2>

            <canvas id="barChart" height="120"></canvas>

        </div>


        <!-- Right -->

        <div class="chart-box">

            <h2 style="margin-bottom:20px;">
                ⚡ Quick Actions
            </h2>

            <a href="add_job.php">
                <button class="action-btn">
                    ➕ Add New Job
                </button>
            </a>

            <br><br>

            <a href="applications.php">
                <button class="action-btn">
                    📋 View Applications
                </button>
            </a>

            <br><br>

            <a href="#">
                <button class="action-btn">
                    👥 Manage Students
                </button>
            </a>

            <br><br>

            <a href="../logout.php">
                <button class="action-btn">
                    🚪 Logout
                </button>
            </a>

        </div>

    </div>


    <!-- Recent Applications -->

    <div class="chart-box" style="margin-top:30px;">

        <h2 style="margin-bottom:20px;">
            📋 Recent Applications
        </h2>

        <table>

            <tr>

                <th align="left">Student</th>
                <th align="left">Job</th>
                <th align="left">Status</th>

            </tr>

            <?php

            $query = mysqli_query($conn,"
            SELECT applications.status,
                   users.full_name,
                   jobs.title
            FROM applications
            JOIN users ON applications.user_id = users.id
            JOIN jobs ON applications.job_id = jobs.id
            ORDER BY applications.id DESC
            LIMIT 5
            ");

            while($row=mysqli_fetch_assoc($query))
            {

            ?>

            <tr>

                <td><?php echo $row['full_name']; ?></td>

                <td><?php echo $row['title']; ?></td>

                <td><?php echo $row['status']; ?></td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>
</body>
</html>