<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Admin table must exist in DB with columns: id, username, password
$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['admin'] = $row['username']; // ✅ Session key "admin"
    header("Location: dashboard.php");
    exit;
} else {
    echo "<script>alert('Invalid Username or Password'); window.location='login.html';</script>";
}
$conn->close();
?>
