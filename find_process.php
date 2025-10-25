<?php
include 'db.php';

$blood_group = $_POST['blood_group'];
$city = $_POST['location'];

$sql = "SELECT * FROM donors WHERE blood_group='$blood_group' AND location LIKE '%$city%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Find Donor | Blood Bank</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body { font-family: 'Poppins', sans-serif; background-color: #f4f6f8; }
.navbar { background-color: #2c3e50; }
.navbar-brand, .nav-link { color: white !important; }
.hero { background: linear-gradient(rgba(44,62,80,0.6), rgba(44,62,80,0.6)), url('blood.jpg') center/cover no-repeat; color: white; padding: 80px 0; text-align: center; }
.card { border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 20px; }
footer { background-color: #2c3e50; color: white; padding: 15px; text-align: center; margin-top: 40px; }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.html">🩸 Blood Bank</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
        <li class="nav-item"><a class="nav-link active" href="find.html">Find Donor</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<section class="hero">
  <div class="container">
    <h1 class="display-5 fw-bold">Search Donors</h1>
    <p class="lead">Showing donors for your selected blood group and city</p>
  </div>
</section>

<!-- Results -->
<div class="container my-5">
  <?php
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<div class='card p-3'>
                  <p><strong>Name:</strong> {$row['NAME']}</p>
                  <p><strong>Blood Group:</strong> {$row['blood_group']}</p>
                  <p><strong>Location:</strong> {$row['location']}</p>
                </div>";
      }
  } else {
      echo "<p class='text-center'>No donors found matching your criteria.</p>";
  }
  $conn->close();
  ?>
</div>

<footer>
  <p>© 2025 Blood Bank Management System | Designed with ❤️ for saving lives</p>
</footer>

</body>
</html>

