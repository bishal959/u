<?php
session_set_cookie_params(600);

// Read the CSV file
$data = array();
if (($handle = fopen("form_data.csv", "r")) !== false) {
  while (($row = fgetcsv($handle, 1000, ",")) !== false) {
    $data[] = $row;
  }
  fclose($handle);
}
// Aggregate data by name
$aggregated_data = array();
foreach ($data as $row) {
  $name = $row[0];
  if (!isset($aggregated_data[$name])) {
    $aggregated_data[$name] = 1;
  } else {
    $aggregated_data[$name]++;
  }
}

// Create the pie chart data
$pie_chart_data = array();
foreach ($aggregated_data as $name => $count) {
  $pie_chart_data[] = array($name, $count);
}


// Encode the pie chart data as a JSON string
$pie_chart_data_json = json_encode($pie_chart_data);

// Generate the pie chart URL
$pie_chart_url = "https://chart.googleapis.com/chart?cht=p&chs=500x250&" . http_build_query(array(
  "chd" => "t:" . implode(",", array_column($pie_chart_data, 1)),
  "chl" => implode("|", array_column($pie_chart_data, 0)),
  "chco" => implode(",", array_map(function($i) { return sprintf("#%06X", mt_rand(0, 0xFFFFFF)); }, range(1, count($pie_chart_data)))),
  "chf" => "bg,s,222222"
  
  
));







?>

<!-- Your dashboard content goes here -->
<link rel="stylesheet" href="style.css" />
<link rel="icon" href="icon.png">

<html>
<head>
<title>Attendance Management System</title>
<link rel="stylesheet" href="style2.css" />
<script src="https://kit.fontawesome.com/385a42cb55.js" crossorigin="anonymous" defer="">
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<header class="header">
<a href="html.php"><h1>Attendance Management System</h1></a>
<ul class="header-ul">
<li><a href="html.php">Home</a></li>
<li><a href="at.php">Attendance List</a></li>
</ul>
   <main>
     <div id="piechart" style="width: 500px; height: 200px;">
   <?php  
     echo "<img src=\"$pie_chart_url\">";
     ?>
       </div>
  </main>
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
</body>
</html>