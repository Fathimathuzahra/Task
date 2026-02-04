<?php
session_start();
include "db.php";
if (isset($_POST['signin'])) {
    $login    = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$login' OR email='$login' OR phone='$login'";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die(mysqli_error($conn));
    }
    $user = mysqli_fetch_assoc($query);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['login_time'] = time();
        header("Location: new_window.php");
        exit;
    } else {
        echo "Wrong credentials";
    }}
?><center>
<h2>Signin</h2>
<form method="post">
    <input type="text" name="login" placeholder=" please type Username or Email or Phone" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="signin">Signin</button>
</form>
<a href="signup.php">Signup</a></center>
