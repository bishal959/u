<?php
// add_user.php
include "db_conn.php";

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location: index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_name = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $sql = "INSERT INTO users (user_name, role, password) VALUES ( '$user_name', '$role', '$password')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<html>
<head>
	<title>Admin Dashboard</title>
</head>
<body>
	<link rel="stylesheet" href="style2.css">
  <script src="namevalid.js"></script>
	<header class="header">
  <a href="html.php"><h1>Attendance Management System</h1></a>
<ul class="header-ul">
<li><a href="adduser.php">ADD USER</a></li>
<li><a href="edituser.php">EDIT USER</a></li>
<li><a href="admin.php">Admin Dashboard</a></li>
<li><a href="logout.php" class="logout">logout</a></li>
</ul>
</header>
<form method="post">
<label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  <label for="role">Role:</label><br>
  <select id="role" name="role" required>
    <option value="#">Please select a role</option>
    <option value="user">User</option>
    <option value="admin">Admin</option>
    <option value="teacher">Teacher</option>
  </select><br><br>
  <input type="submit" value="Submit">
</form>
