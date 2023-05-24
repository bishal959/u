<?php
session_set_cookie_params(600);
include("header.php");
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

<script src="https://kit.fontawesome.com/385a42cb55.js" crossorigin="anonymous" defer="">
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <main>
     <div id="piechart" style="width: 500px; height: 200px;">
   <?php  
     echo "<img src=\"$pie_chart_url\">";
     ?>
       </div>
  </main>
</body>
<div>
  <?php include("footer.php"); ?>
</div>
</html>
