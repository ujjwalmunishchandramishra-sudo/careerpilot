<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Account</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Create Account</h1>
    <p class="subtitle">Join CareerPilot and take the next step in your career.</p>

    <!-- Name -->
    <div class="input-box">
        <span>👤</span>
        <input type="text" placeholder="Full Name">
    </div>

    <!-- Email -->
    <div class="input-box">
        <span>📧</span>
        <input type="email" placeholder="Email Address">
    </div>

    <!-- Password -->
    <div class="input-box">
        <span>🔒</span>
        <input type="password" placeholder="Password">
        <span class="eye">👁️</span>
    </div>

    <!-- Confirm Password -->
    <div class="input-box">
        <span>🔒</span>
        <input type="password" placeholder="Confirm Password">
        <span class="eye">👁️</span>
    </div>

    <!-- ROLE SECTION -->
    <div class="role-section">
        <h3>Select Role</h3>
        <p>Choose your role to get started</p>

        <div class="roles">

            <label class="role-card">
                <input type="radio" name="role" checked>
                <div class="card">
                    <div class="icon">🎓</div>
                    <h4>Student</h4>
                    <p>I’m here to find jobs, learn and grow</p>
                </div>
            </label>

            <label class="role-card">
                <input type="radio" name="role">
                <div class="card">
                    <div class="icon">💼</div>
                    <h4>Admin (Job Giver)</h4>
                    <p>I’m here to post jobs and hire talent</p>
                </div>
            </label>

        </div>
    </div>

    <!-- BUTTON -->
    <button class="btn">Create Account</button>

    <p class="login">
        Already have an account? <a href="#">Login</a>
    </p>

</div>

</body>
</html>