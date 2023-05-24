<?php
    // echo '<pre>';
    // var_dump($_SESSION);
    // echo '</pre>';
   
?>
<html>
    <head>
        <link rel="stylesheet" href="./sass/header.css">
    </head>
    <body>
        <header class="header">
            <a href="html.php"><h1>Attendance Management System</h1></a>
                <ul class="header-ul">
                <!-- <li><a href="adduser.php">ADD USER</a></li>
                <li><a href="edituser.php">EDIT USER</a></li>
                <li><a href="admin.php">Admin Dashboard</a></li> -->
                <li><a href="" ><?php print_r($_SESSION['user_name']); ?></a></li>
                <li><a href="logout.php" class="logout">logout</a></li>
            </ul>
        </header>
    </body>
</html>