<?php
include "db_conn.php";
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location: index.php');
}

include("adminheader.php");

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

?>
<html>
<head>
	<title>Admin Dashboard</title>
  <link rel="stylesheet" href="./sass/add-edituser.css">
</head>
<body>
  <main>
    <form method="post">
      <input type="text" id="id" name="id" placeholder="Enter Your id"required>
      <select id="role" name="role" required>
        <option value="#">Please select a role</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
        <option value="teacher">Teacher</option>
      </select>
      <input type="submit" value="Update Role">
    </form>
  </main>
  <?php include("footer.php"); ?>
</body>
</html>
