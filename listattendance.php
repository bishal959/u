<?php
include "db_conn.php";

// $sql = "SELECT * FROM form_data";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   echo "<table><tr><th>Name</th><th>Date</th></tr>";
//   while($row = $result->fetch_assoc()) {
//     echo "<tr><td>".$row["name"]."</td><td>".$row["date"]."</td></tr>";
//   }
//   echo "</table>";
// } else {
//   echo "0 results";
// }
// $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSV Data</title>
  <link rel="icon" href="icon.png">
</head>
<body>
<title>Attendance Management System</title>
<link rel="stylesheet" href="style2.css" />
<script src="https://kit.fontawesome.com/385a42cb55.js" crossorigin="anonymous" defer="">
  </script>
<body>
<header class="header">
<a href="html.php"><h1>Attendance Management System</h1></a>
<ul class="header-ul">
<li><a href="html.php">Home</a></li>
<li><a href="about.php">piechart</a></li>
</ul>
<?php
                $sql = "SELECT * FROM form_data";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  echo "<table><tr><th>Name</th><th>Date</th></tr>";
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["name"]."</td><td>".$row["date"]."</td></tr>";
                  }
                  echo "</table>";
                } else {
                  echo "0 results";
                }
                $conn->close();
			?>
	
<footer>
<ul>
<li>
<a href="https://www.facebook.com/bishal.luitel.12" target="_blank"><i class="fa-brands fa-facebook"></i
          ></a>
</li>
<li>
<a href="https://www.youtube.com/channel/UC1AQ6okXwLa3X2AYgbYrbpA" target="_blank"><i class="fa-brands fa-youtube"></i
          ></a>
</li>
<li>
<a href="https://www.instagram.com/bishal.luitel.12/" target="_blank"><i class="fa-brands fa-instagram"></i
          ></a>
</li>
</ul>
<p>&copy; 2023 Attendance Management System</p>
</footer>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114" integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw==" data-cf-beacon='{"rayId":"7acd194cee429e7a","version":"2023.3.0","r":1,"token":"0f06f782433a41649e6584e7774d1f8a","si":100}' crossorigin="anonymous"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114" integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw==" data-cf-beacon='{"rayId":"7acd20b1ae629e80","version":"2023.3.0","r":1,"token":"0f06f782433a41649e6584e7774d1f8a","si":100}' crossorigin="anonymous"></script>
  </tbody>
	</table>
</body>
</html>
