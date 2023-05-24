<?php
session_start();
include "db_conn.php";
include "teacher_header.php";

$subject = "Operating System"; // Specify the subject for which you want to display the attendance

$sql = "SELECT user_name, date, status FROM attendance WHERE subject = '$subject'";
$result = $conn->query($sql);

// Create an empty array to store the attendance data
$attendanceData = array();

// Check if there are any rows returned from the query
if ($result->num_rows > 0) {
    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        // Create a new associative array for each attendance record
        $attendanceRecord = array(
            'user_name' => $row['user_name'],
            'date' => $row['date'],
            'status' => $row['status']
        );
        
        // Add the attendance record to the $attendanceData array
        $attendanceData[] = $attendanceRecord;
    }
}

// Create an array to store the attendance status for each day of the month
$attendanceByDay = array();
foreach ($attendanceData as $data) {
    $date = date('j', strtotime($data['date'])); // Extract the day from the date
    $user_Name = $data['user_name'];
    $status = $data['status'];
    
    // Store the attendance status in the attendanceByDay array
    $attendanceByDay[$user_Name][$date] = $status;
}

// Generate the table
echo '<table>';
echo '<tr><th>S/L</th><th>Student Name</th>';

// Create table headers for each day of the month
for ($day = 1; $day <= 31; $day++) {
    echo '<th>' . $day . '</th>';
}

echo '</tr>';

// Iterate over the student attendance data
$serialNumber = 1;
foreach ($attendanceByDay as $user_Name => $attendance) {
    echo '<tr>';
    echo '<td>' . $serialNumber++ . '</td>';
    echo '<td>' . $user_Name . '</td>';
    
    // Generate table cells for each day of the month
    for ($day = 1; $day <= 31; $day++) {
        // Check if the attendance data is available for the specific day
        if (isset($attendance[$day])) {
            $status = $attendance[$day];
            echo '<td>' . $status . '</td>';
        } else {
            echo '<td></td>'; // No attendance data available for this day
        }
    }
    
    echo '</tr>';
}

echo '</table>';

$conn->close();
?>
