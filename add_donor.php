<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $sql = "INSERT INTO donors (name, age, gender, blood_group, phone, location)
            VALUES ('$name', '$age', '$gender', '$blood_group', '$phone', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "Donor Registered Successfully! <a href='dashboard.php'>Go to Dashboard</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add Donor</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br>
    Age: <input type="number" name="age" required><br>
    Gender: <input type="text" name="gender"><br>
    Blood Group: <input type="text" name="blood_group" required><br>
    Phone: <input type="text" name="phone" required><br>
    Location: <input type="text" name="location"><br>
    <input type="submit" value="Add Donor">
</form>
