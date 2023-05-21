<?php
// Get the form data
$name = $_POST['name'];
$date = $_POST['date'];

// Check if the data already exists in the CSV file
if (($handle = fopen("form_data.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        if ($data[0] == $name && $data[1] == $date) {
            // Data already exists, display message and exit
            echo "Data already exists in the CSV file";
        header('Location: html.php');
        
            fclose($handle);
            exit;
            
        }
    }
    fclose($handle);
}

// Create an array with the form data
$data = array($name, $date);

// Open the CSV file for writing
$fp = fopen('form_data.csv', 'a');

// Write the form data to the CSV file
fputcsv($fp, $data);

// Close the CSV file
fclose($fp);

// Display a message to the user
echo "your attendance has been sucessfully recorded";
?>
<script>

setTimeout(function(){
    console.log('Delayed message');
}, 3000);
 setTimeout(() => {
    Headers(location="html.php")
}, 10); 
</script>