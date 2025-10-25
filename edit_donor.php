<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

include 'db.php';

// Make sure 'id' exists
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: Donor ID is missing.");
}

$id = intval($_GET['id']);

// Fetch donor safely
$stmt = $conn->prepare("SELECT * FROM donors WHERE donor_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    die("Error: Donor not found.");
}

$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Donor | Blood Bank</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }
.container { max-width: 500px; margin: 50px auto; }
.card { padding: 20px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
button { width: 100%; }
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <h3 class="mb-4 text-center">Edit Donor</h3>
        <form action="update_donor.php" method="POST">
            <input type="hidden" name="donor_id" value="<?= $row['donor_id'] ?>">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['NAME']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Age</label>
                <input type="number" name="age" class="form-control" value="<?= $row['age'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Gender</label>
                <select name="gender" class="form-select" required>
                    <option value="Male" <?= $row['gender']=="Male" ? "selected" : "" ?>>Male</option>
                    <option value="Female" <?= $row['gender']=="Female" ? "selected" : "" ?>>Female</option>
                    <option value="Other" <?= $row['gender']=="Other" ? "selected" : "" ?>>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Blood Group</label>
                <input type="text" name="blood_group" class="form-control" value="<?= htmlspecialchars($row['blood_group']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($row['phone']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($row['location']) ?>" required>
            </div>
            <button type="submit" class="btn btn-danger">Update Donor</button>
        </form>
    </div>
</div>
</body>
</html>
<?php $conn->close(); ?>