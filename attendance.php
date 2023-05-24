<?php

include "db_conn.php";

// // Close database connection
// mysqli_close($conn);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_name = $_POST['user_name'];
  $subject = $_POST['subject'];
  $date = $_POST['date'];
  $status = $_POST['r1'];

  // Insert the form data into the database
  $sql = "INSERT INTO attendance(user_name, subject, date, status) VALUES ('$user_name', '$subject', '$date', '$status')";
  
  if ($conn->query($sql) === TRUE) {
    echo "Attendance recorded successfully";
  } else {
    echo "Error recording attendance: " . $conn->error;
  }
}
header("location:teacher.php");
  $conn->close();
?>