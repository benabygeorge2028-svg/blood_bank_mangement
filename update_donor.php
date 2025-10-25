<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_id = $_POST['donor_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE donors SET name=?, age=?, gender=?, blood_group=?, phone=?, location=? WHERE donor_id=?");
    $stmt->bind_param("sissssi", $name, $age, $gender, $blood_group, $phone, $location, $donor_id);

    if ($stmt->execute()) {
        echo "<script>alert('Donor updated successfully!'); window.location='view_donors.php';</script>";
    } else {
        echo "Error updating donor: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
