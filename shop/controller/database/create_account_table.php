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
$sql = "CREATE TABLE account 
(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    shop_id INT(6) NOT NULL,
    customer_id INT(6) REFERENCES customer(id),
    ac_date DATE NOT NULL,
    detail VARCHAR(255) NOT NULL,
    quantity INT(10) NOT NULL,
    nang INT(10) NOT NULL,
    bhav INT(10) NOT NULL,
    rokada INT(10) NOT NULL,
    baki INT(10) NOT NULL,
    total INT(10) NOT NULL,
    jama INT(10) NOT NULL DEFAULT '0',
    note VARCHAR(255) NOT NULL  
)";

if (mysqli_query($conn, $sql)) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

// $dob = date('Y-m-d', strtotime($_POST['dateofbirth']));
mysqli_close($conn);
?>