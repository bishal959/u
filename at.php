<!DOCTYPE html>
<html>
<head>
	<title>CSV Data</title>
  <link rel="icon" href="icon.png">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Date 1</th>
				<th>Date 2</th>
				<th>Date 3</th>
              	<th>Date 4</th>
              	<th>Date 5</th>
              	<th>Date 6</th>
              	<th>Date 7</th>
              	<th>Date 8</th>
				<th>Date 9</th>
				<th>Date 10</th>
              	<th>Date 11</th>
              	<th>Date 12</th>
              	<th>Date 13</th>
              	<th>Date 14</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (($handle = fopen("form_data.csv", "r")) !== false) {
			    // Initialize an empty array for storing the data
			    $data = array();
			    while (($row = fgetcsv($handle, 1000, ",")) !== false) {
			        $name = $row[0];
			        $date = $row[1];
			        
			        // Check if the name is already in the data array
			        if (array_key_exists($name, $data)) {
			            // If the name is already in the array, add the date to the next available column
			            $i = 1;
			            while (array_key_exists("Date " . $i, $data[$name])) {
			                $i++;
			            }
			            $data[$name]["Date " . $i] = $date;
			        } else {
			            // If the name is not in the array, add a new row with the name and date
			            $data[$name] = array("Name" => $name, "Date 1" => $date);
			        }
			    }
			    $csv_data = array_map('str_getcsv', file('form_data.csv'));

// Sort the CSV data by the date column
usort($csv_data, function($a, $b) {
    return strtotime($a[1]) - strtotime($b[1]);
});

// Write the sorted CSV data back to the file
$fp = fopen('form_data.csv', 'w');
foreach ($csv_data as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);
			    // Output the data to the table
			    foreach ($data as $row) {
			        echo "<tr>";
			        foreach ($row as $cell) {
			            echo "<td>" . $cell . "</td>";
			        }
			        echo "</tr>";
			    }
			}
			?>
	


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
