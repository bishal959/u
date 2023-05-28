<?php
$sname= "10.121.8.4";
$unmae= "root";
$password = "VZRssh87411";
$db_name = "wptest";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {
	echo "Connection failed!";
}
?>
