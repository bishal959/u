<?php
session_start();
include "db_conn.php";

$can_access_page = false;
if(isset($_SESSION['admin_id'])  || isset($_SESSION['teacher_id'])){
    $can_access_page = true;
}

if(!$can_access_page){
    header('location: index.php');
    exit();
}




$sql = "SELECT user_name FROM users WHERE role='user'";
$result = mysqli_query($conn, $sql);

// Create an HTML form


// Close the database connection






include("teacher_header.php")



?>

<html>
<head>
<title>Attendance Management System</title>
<!-- <link rel="stylesheet" href="form.css" /> -->
  <link rel="icon" href="icon.png">
<script src="https://kit.fontawesome.com/385a42cb55.js" crossorigin="anonymous" defer="">
  </script>
</head>
<body>

<main>
<h2>Attendance Form</h2>
<form method="POST" action="attendance.php">
<?php
  echo "<label for='user_name'>Select a user_name:</label>";
  echo "<select name='user_name' id='user_name'>";

  // Populate the select dropdown list
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row["user_name"] . "' >" . $row["user_name"] . "</option>";
  }

  echo "</select>";

   
mysqli_close($conn);
?>
   <form method="post" action="attendance.php">
   <label>Subject</label>
      <input type="text" name="subject" value="<?php echo $_SESSION['selectedSubject']; ?>" readonly ><br>
        <!-- <input type="date" id="myDateInput" name="date"min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" required > -->
        <input type="date" id="date" name="date" required readonly><br>
         <br><label>Present</label>
         <input type="radio" name="r1" value="Present" >
         <label>Absent </label>
         <input type="radio" name="r1" value="Absent" checked >
       

<button type="submit">Submit</button>
</form>
</main>
<script>
    // Get the current date
    var currentDate = new Date().toISOString().split('T')[0];

    // Set the current date as the default value for the date input field
    document.getElementById("date").value = currentDate;
  </script>
</html>
<?php include("footer.php");?>
