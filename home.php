<?php
session_start();

/* ===== LOGOUT HANDLER (same page pattern) ===== */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

/* ===== PROTECT PAGE ===== */
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="Home.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="home.php">
        🎓 Student Portal
    </a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="home.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="practice.php">Notices & Tools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="home.php?logout=1">
                Logout (<?php echo htmlspecialchars($username); ?>)
            </a>
        </li>
    </ul>
</nav>

<!-- ===== WELCOME ===== -->
<div class="container welcome-box">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?> 👋</h2>
    <p>Your personal student dashboard</p>
</div>

<!-- ===== DASHBOARD CARDS ===== -->
<div class="container dashboard">
    <div class="row">

        <div class="col-md-4">
            <div class="dash-card">
                <i class="fa fa-book"></i>
                <h4>Study Materials</h4>
                <p>Access subject notes and resources.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dash-card">
                <i class="fa fa-calendar"></i>
                <h4>Academic Schedule</h4>
                <p>View exams, classes, and deadlines.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dash-card">
                <i class="fa fa-user"></i>
                <h4>Profile</h4>
                <p>Manage your account information.</p>
            </div>
        </div>

    </div>
</div>

<!-- ===== FOOTER ===== -->
<footer>
    © 2025 Student Resource Portal |IWT Project
</footer>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
