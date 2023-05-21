<?php

include "db_conn.php";


// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $name = $_POST['name'];
  $date = $_POST['date'];

  // Sanitize the data to prevent SQL injection
  $name = mysqli_real_escape_string($conn, $name);
  $date = mysqli_real_escape_string($conn, $date);

  // Insert the data into the database
  $sql = "INSERT INTO form_data (name, date) VALUES ('$name', '$date')";
  if (mysqli_query($conn, $sql)) {
    echo 'Form data has been saved.';
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }
}

// Close database connection
mysqli_close($conn);
?>

<script>

setTimeout(function(){
    console.log('Delayed message');
}, 3000);
 setTimeout(() => {
    Headers(location="teacher.php")
}, 10); 
</script>
