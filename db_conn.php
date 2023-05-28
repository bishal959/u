<?php

$sname= "sql108.epizy.com";
$unmae= "epiz_34107324";
$password = "bb7P9jJ0VpqzCv";

$db_name = "epiz_34107324_wptest";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
?>
