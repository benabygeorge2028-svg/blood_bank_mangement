<?php
session_start();
if (!isset($_SESSION['admin'])) {  // <-- match the login session
    header("Location: login.html");
    exit();
}
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM donors WHERE donor_id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Donor Deleted Successfully!'); window.location='view_donors.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No donor ID provided!";
}

$conn->close();
?>
