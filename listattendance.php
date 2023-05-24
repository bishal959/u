<?php
session_start();
include "db_conn.php";
include"header.php";
?>

<?php
                $sql = "SELECT * FROM attendance";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  echo "<table><tr><th>Name</th><th>Date</th></tr>";
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["user_name"]."</td><td>".$row["date"]."</td></tr>";
                  }
                  echo "</table>";
                } else {
                  echo "0 results";
                }
                $conn->close();
                include "footer.php";
			?>
	


