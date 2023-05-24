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
                <li><a href="#">download attendance</a></li>
                <li><a href="listattendance.php">list attendance</a></li>
                <li><a href="listuser.php">list student</a></li>
                <li><a href="" >Hello, <?php print_r($_SESSION['teacher_name']); ?></a></li>
                <li><a href="logout.php" class="logout">logout</a></li>
            </ul>
        </header>
    </body>
</html>