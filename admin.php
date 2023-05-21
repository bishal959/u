<?php
include "db_conn.php";
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
</head>
<body>
	<link rel="stylesheet" href="style2.css">
	<header class="header">
  <a href="html.php"><h1>Attendance Management System</h1></a>
<ul class="header-ul">
<li><a href="adduser.php">ADD USER</a></li>
<li><a href="edituser.php">EDIT USER</a></li>
<li><a href="admin.php">Admin Dashboard</a></li>
<li><a href="logout.php" class="logout">logout</a></li>
</ul>
</header>

	
	<div>
	<?php

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th><th>Role</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["user_name"]."</td><td>".$row["role"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
	</div>
	<div class="container mt-4">
		<p>You are logged in as an admin. Here's the admin dashboard.</p>
		<p>You can view and manage users, update settings, and more.</p>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-+lm/KRyA9JTD5gQvy5r5fDmG+5m3E3qCZcv0BSJHlR5yli9sd9lvf2r5/h5Ppf+H" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JK" crossorigin="anonymous"></script>
</body>
</html>