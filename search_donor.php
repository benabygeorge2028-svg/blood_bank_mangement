<?php
include 'db.php';
?>

<h2>Search Donors</h2>
<form method="POST">
    Blood Group: <input type="text" name="blood_group"><br>
    Location: <input type="text" name="location"><br>
    <input type="submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood_group = $_POST['blood_group'];
    $location = $_POST['location'];

    $sql = "SELECT * FROM donors WHERE 1=1";
    if (!empty($blood_group)) {
        $sql .= " AND blood_group='$blood_group'";
    }
    if (!empty($location)) {
        $sql .= " AND location LIKE '%$location%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Search Results</h3>";
        echo "<table border='1'>
              <tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th>
              <th>Blood Group</th><th>Phone</th><th>Location</th><th>Actions</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                  <td>{$row['donor_id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['age']}</td>
                  <td>{$row['gender']}</td>
                  <td>{$row['blood_group']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['location']}</td>
                  <td>
                      <a href='edit_donor.php?id={$row['donor_id']}'>Edit</a> | 
                      <a href='delete_donor.php?id={$row['donor_id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
                  </td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No donors found.";
    }
}
?>
