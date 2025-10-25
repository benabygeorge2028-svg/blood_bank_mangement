<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}
include 'db.php';
$result = $conn->query("SELECT * FROM donors");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - View Donors</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body { font-family: 'Poppins', sans-serif; background: #f4f6f8; padding: 40px; }
.table { background: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
a.btn { margin-right: 5px; }
</style>
</head>
<body>
<h2 class="mb-4">All Donors</h2>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>ID</th><th>Name</th><th>Age</th><th>Gender</th>
      <th>Blood Group</th><th>Phone</th><th>Location</th><th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['donor_id']}</td>
                    <td>{$row['NAME']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['blood_group']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['location']}</td>
                    <td>
                      <a class='btn btn-sm btn-warning' href='edit_donor.php?id={$row['donor_id']}'>Edit</a>
                      <a class='btn btn-sm btn-danger' href='delete_donor.php?id={$row['donor_id']}'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='8' class='text-center'>No donors found.</td></tr>";
    }
    $conn->close();
    ?>
  </tbody>
</table>
</body>
</html>

