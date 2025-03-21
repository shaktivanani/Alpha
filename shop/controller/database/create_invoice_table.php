<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alpha";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to create Users table
$sql = "CREATE TABLE invoice 
(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    shop_id INT(6) NOT NULL,
    customer_id INT(6) NOT NULL,
    ac_date DATE NOT NULL,
    detail VARCHAR(255) NOT NULL,
    cradit INT(6) NOT NULL,
    dabit INT(6) NOT NULL    
)";

if (mysqli_query($conn, $sql)) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

// $dob = date('Y-m-d', strtotime($_POST['dateofbirth']));
mysqli_close($conn);
?>