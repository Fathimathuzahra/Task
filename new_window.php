<?php
session_start();
if (!isset($_SESSION['login_time']) || time() - $_SESSION['login_time'] > 5) {session_destroy();header("Location: signin.php");
    exit;}
?>
<h2>Welcome <?php echo $_SESSION['user']; ?></h2>
<h3>Attendance Management</h3>
<h3>Payroll</h3>
<script>
    setTimeout("location.href='signin.php'", 5000);
</script>
