<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit;
}
$admin_name = $_SESSION['admin'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | Blood Bank</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f6f8;
      color: #333;
    }
    .navbar {
      background: #2c3e50;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }
    .navbar h2 { margin: 0; font-weight: 600; }
    .navbar a {
      color: white;
      text-decoration: none;
      margin-left: 15px;
      font-weight: 500;
    }
    .navbar a:hover { color: #e74c3c; }
    .content {
      padding: 40px;
      text-align: center;
    }
    .card {
      background: white;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: 0 auto;
    }
    button {
      background: #e74c3c;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      font-size: 15px;
      margin-top: 20px;
    }
    button:hover {
      background: #c0392b;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <h2>🩸 Admin Dashboard</h2>
    <div>
      <a href="view_donors.php">View Donors</a>
      <a href="register.html">Register Donor</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <div class="content">
    <div class="card">
      <h1>Welcome, <?php echo $admin_name; ?> 👋</h1>
      <p>Use the links above to manage donors or view the donor database.</p>
      <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
      </form>
    </div>
  </div>
</body>
</html>

