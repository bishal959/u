<?php

session_start();

include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $user_id = $_SESSION['user_id'];

  // Retrieve current password from database
  $sql = "SELECT password FROM users WHERE id='$user_id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $password = $row['password'];

  // Verify current password
  if ($password == $current_password) {
    // Check if new password matches confirm password
    if ($new_password == $confirm_password) {
      // Update password in database
      $sql = "UPDATE users SET password='$new_password' WHERE id='$user_id'";
      if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully";
      } else {
        echo "Error updating password: " . $conn->error;
      }
    } else {
      echo "New password and confirm password do not match";
    }
  } else {
    echo "Incorrect current password";
  }
}
header("html.php");
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
	<title>HOME</title>
 
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php include("header.php"); ?>
     <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
     <form method="post">
       <label for="username">Username:</label><br>
       <input type="text" name="username" value="<?php echo $_SESSION['user_name']; ?>" readonly ><br>
       <label for="current_password">Current Password:</label><br>
       <input type="password" id="current_password" name="current_password" required><br>
       <label for="new_password">New Password:</label><br>
       <input type="password" id="new_password" name="new_password" required><br>
       <label for="confirm_password">Confirm Password:</label><br>
       <input type="password" id="confirm_password" name="confirm_password" required><br>
       <input type="submit" value="Submit">
     </form>
</body>
</html>
