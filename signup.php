<?php
include "db.php";
$errors = [];
if (isset($_POST['signup'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $password = $_POST['password'];
    if (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters";}
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";}
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "Phone must be exactly 10 digits";}
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";}
    $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' OR phone='$phone'");
    if (mysqli_num_rows($check) > 0) {
        $errors[] = "Email or phone already exists";}
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users (username, email, phone, password) VALUES ('$username','$email','$phone','$hashedPassword')");

        header("Location: signin.php");
        exit;}}
?>
<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";}} ?>
<center>
<h2>Signup</h2>
<form method="post">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="phone" placeholder="Phone" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="signup">Signup</button>
</form>
</center>
