<?php
session_start();

/* ===== Railway DB Connection ===== */
$host = getenv("DB_HOST");
$user = getenv("DB_USER");
$pass = getenv("DB_PASS");
$db   = getenv("DB_NAME");
$port = getenv("DB_PORT");

$link = mysqli_connect($host, $user, $pass, $db, $port);
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

/* ===== Helper ===== */
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

/* ===== LOGIN ===== */
if (isset($_POST['login'])) {
    $username = test_input($_POST['Username']);
    $password = test_input($_POST['Password']);

    $sql = "SELECT * FROM usertable WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $login_error = "Invalid username or password";
    }
}

/* ===== SIGNUP ===== */
if (isset($_POST['signup'])) {
    $username = test_input($_POST['Username']);
    $pass1 = test_input($_POST['Password']);
    $pass2 = test_input($_POST['ConfirmPassword']);

    if ($pass1 != $pass2) {
        $signup_error = "Passwords do not match";
    } else {
        $sql = "INSERT INTO usertable (Username, Password) VALUES ('$username','$pass1')";
        if (mysqli_query($link, $sql)) {
            $signup_success = "Signup successful! Please login.";
        } else {
            $signup_error = "Username already exists";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>College Shiksha</title>

    <!-- CSS -->
    <link rel="stylesheet" href="Login.css">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!-- ===== LOGIN FORM ===== -->
<div class="form" id="login">
    <div class="box">
        <h3>LOGIN</h3>

        <?php if (!empty($login_error)) echo "<p>$login_error</p>"; ?>
        <?php if (!empty($signup_success)) echo "<p>$signup_success</p>"; ?>

        <form method="POST">
            <input class="input" type="text" name="Username" placeholder="Username" required>
            <input class="input" type="password" name="Password" placeholder="Password" required>
            <input class="button" type="submit" name="login" value="LOGIN"><br><br>

            <a href="#" id="oksignup">Sign Up here</a>
        </form>
    </div>
</div>

<!-- ===== SIGNUP FORM ===== -->
<div class="form reg" id="signup">
    <div class="box">
        <h3>SIGN UP</h3>

        <?php if (!empty($signup_error)) echo "<p>$signup_error</p>"; ?>

        <form method="POST">
            <input class="input" type="text" name="Username" placeholder="Username" required>
            <input class="input" type="password" name="Password" placeholder="Password" required>
            <input class="input" type="password" name="ConfirmPassword" placeholder="Confirm Password" required>
            <input class="button" type="submit" name="signup" value="SIGN UP"><br><br>

            <a href="#" id="oklogin">Login here</a>
        </form>
    </div>
</div>

<!-- ===== JS ===== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#oksignup').click(function (e) {
        e.preventDefault();
        $('#login').addClass('reg');
        $('#signup').removeClass('reg');
    });

    $('#oklogin').click(function (e) {
        e.preventDefault();
        $('#signup').addClass('reg');
        $('#login').removeClass('reg');
    });
});
</script>

</body>
</html>
