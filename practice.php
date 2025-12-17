<?php
session_start();

/* ===== LOGOUT HANDLER (same page) ===== */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

/* ===== PAGE PROTECTION ===== */
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Notices & Tools</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="practice.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" href="jagran_logo1.jpg">
</head>

<body style="font-family: 'Quicksand', sans-serif;">

<!-- ===== NAVBAR ===== -->
<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
        <img src="jagran_logo1.jpg" width="30" height="30">
        Student Portal
    </a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Dashboard</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="practice.php">Notices & Tools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="practice.php?logout=1">
                Logout (<?php echo htmlspecialchars($username); ?>)
            </a>
        </li>
    </ul>
</nav>

<!-- ===== WELCOME ===== -->
<div class="container mt-4 text-center">
    <h3>Welcome, <?php echo htmlspecialchars($username); ?> 👋</h3>
    <p class="text-muted">Here are today’s important updates and student utilities.</p>
</div>

<!-- ===== NOTICES ===== -->
<div class="container mt-4">
    <h4><i class="fa fa-bullhorn"></i> Latest Notices</h4>

    <div class="alert alert-info">
        📢 Mid-Sem exams will start from <b>16th December</b>.
    </div>

    <div class="alert alert-warning">
        📝 Assignment submission deadline: <b>20th December</b>.
    </div>

    <div class="alert alert-success">
        🎉 New study materials have been uploaded for PHP & Linux.
    </div>
</div>

<!-- ===== STUDENT TOOLS ===== -->
<div class="container mt-4 mb-5">
    <h4><i class="fa fa-wrench"></i> Quick Student Tools</h4>

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card p-3">
                <h5>📚 Study Planner</h5>
                <p>Plan your daily study schedule effectively.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>🧮 Attendance Tracker</h5>
                <p>Maintain attendance records and eligibility.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>📄 Assignment Status</h5>
                <p>Check pending and submitted assignments.</p>
            </div>
        </div>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<footer class="bg-dark text-white text-center p-3">
    © 2025 Student Resource Portal | IWT Project
</footer>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
