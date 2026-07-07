<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Total Applications
$appQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM applications WHERE user_id='$user_id'");
$appData = mysqli_fetch_assoc($appQuery);

// Total Jobs
$jobQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM jobs");
$jobData = mysqli_fetch_assoc($jobQuery);

// Resume Uploaded
$resumeQuery = mysqli_query($conn, "SELECT * FROM resumes WHERE user_id='$user_id'");
$resumeUploaded = mysqli_num_rows($resumeQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CareerPilot Dashboard</title>

<link rel="stylesheet"
href="css/dashboard.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

<!-- Sidebar -->

<div class="sidebar">

<div class="logo">

    <div class="avatar">
        👨‍🎓
    </div>

    <h2>CareerPilot</h2>

    <p>
        <?php echo $_SESSION['full_name']; ?>
    </p>

    <small>Student</small>

</div>
<ul>

<li>🏠 Dashboard</li>

<li>
<a href="resume.php">
📄 Resume Analyzer
</a>
</li>
<li>
<a href="jobs.php">
💼 Available Jobs
</a>
</li>
<li>
<a href="jobs.html">
📊 My Job Tracker
</a>
</li>

<li>
<a href="dsa.html">
💻 DSA Sheet
</a>
</li>
<li>
<a href="interview.html">
🎤 Interview Prep
</a>
</li>

<li>
<a href="profile.php">
👤 Profile
</a>
</li>

<li>
<a href="settings.html">
⚙ Settings
</a>
</li>

<li>
<a href="my_applications.php">
📋 My Applications
</a>
</li>

<li>
<a href="logout.php">
🚪 Logout
</a>
</li>

</ul>

</div>


<!-- ================= MAIN CONTENT ================= -->

<div class="main">

    <!-- Top Bar -->
    <div class="topbar">

        <div>
            <h1>Welcome, <?php echo $_SESSION['full_name']; ?> 👋</h1>
            <p style="color:#94a3b8;margin-top:5px;">
                Here's an overview of your CareerPilot account.
            </p>
        </div>

        <div style="display:flex;align-items:center;gap:15px;">

            <span style="font-size:28px;cursor:pointer;">🔔</span>

            <button id="darkBtn">
                🌙 Dark Mode
            </button>

        </div>

    </div>


    <!-- Statistics Cards -->

    <div class="cards">

        <div class="card">
            <h3>📄 Resume</h3>
            <h1><?php echo ($resumeUploaded>0) ? "Uploaded" : "Pending"; ?></h1>
            <p>Resume Status</p>
        </div>

        <div class="card">
            <h3>📋 Applications</h3>
            <h1><?php echo $appData['total']; ?></h1>
            <p>Applications Submitted</p>
        </div>

        <div class="card">
            <h3>💼 Jobs</h3>
            <h1><?php echo $jobData['total']; ?></h1>
            <p>Jobs Available</p>
        </div>

        <div class="card">
            <h3>🎤 Interview</h3>
            <h1>68%</h1>
            <p>Preparation Progress</p>
        </div>

    </div>


    <!-- Bottom Section -->

    <div class="charts">

        <!-- Left -->

        <div class="chart-box">

            <h2 style="margin-bottom:20px;">
                📊 Application Progress
            </h2>

            <canvas id="barChart" height="120"></canvas>

        </div>


        <!-- Right -->

        <div class="chart-box">

            <h2 style="margin-bottom:20px;">
                ⚡ Quick Actions
            </h2>

            <a href="resume.php">
                <button class="action-btn">
                    📄 Upload Resume
                </button>
            </a>

            <br><br>

            <a href="jobs.php">
                <button class="action-btn">
                    💼 Browse Jobs
                </button>
            </a>

            <br><br>

            <a href="profile.php">
                <button class="action-btn">
                    👤 Edit Profile
                </button>
            </a>

            <br><br>

            <a href="my_applications.php">
                <button class="action-btn">
                    📋 My Applications
                </button>
            </a>

        </div>

    </div>


    <!-- Recent Applications -->

    <div class="chart-box" style="margin-top:30px;">

        <h2 style="margin-bottom:20px;">
            📋 Recent Applications
        </h2>

        <table style="width:100%;border-collapse:collapse;">

            <tr style="border-bottom:1px solid #334155;">
                <th align="left">Company</th>
                <th align="left">Role</th>
                <th align="left">Status</th>
            </tr>

            <tr>
                <td style="padding:15px 0;">Google</td>
                <td>Software Engineer Intern</td>
                <td style="color:#22c55e;">Applied</td>
            </tr>

            <tr>
                <td style="padding:15px 0;">Amazon</td>
                <td>Data Analyst</td>
                <td style="color:#facc15;">Interview</td>
            </tr>

            <tr>
                <td style="padding:15px 0;">Microsoft</td>
                <td>Backend Developer</td>
                <td style="color:#38bdf8;">Accepted</td>
            </tr>

        </table>

    </div>

</div>
<script src="js/dashboard.js"></script>

</body>
</html>