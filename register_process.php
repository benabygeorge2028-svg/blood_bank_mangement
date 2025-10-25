<?php
include 'db.php';

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$phone = $_POST['phone'];
$location = $_POST['location'];

// Insert into database
$sql = "INSERT INTO donors (NAME, age, gender, blood_group, phone, location)
        VALUES ('$name', '$age', '$gender', '$blood_group', '$phone', '$location')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Donor Registered Successfully!'); window.location='index.html';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
