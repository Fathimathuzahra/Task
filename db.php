<?php
$conn = mysqli_connect("localhost", "root", "NP17", "task");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
