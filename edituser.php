<?php
include "db_conn.php";
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $role = $_POST['role'];

  $sql = "UPDATE users SET role='$role' WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "User role updated successfully";
  } else {
    echo "Error updating user role: " . $conn->error;
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
  <label for="id">User ID:</label><br>
  <input type="text" id="id" name="id" required><br>
  <label for="role">New Role:</label><br>
  <select id="role" name="role" required>
    <option value="#">Please select a role</option>
    <option value="user">User</option>
    <option value="admin">Admin</option>
    <option value="teacher">Teacher</option>
  </select><br><br>
  <input type="submit" value="Update Role">
</form>
