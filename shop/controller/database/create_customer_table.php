<?php
include 'db.php';

// sql to create Users table
$sql = "CREATE TABLE customer 
(
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    shop INT(4) NOT NULL,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,   
    village VARCHAR(255) NOT NULL,
    mobile INT(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(10) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    create_at DATE NOT NULL,
    user_role INT(1) NOT NULL DEFAULT '4'
    
)";

if (mysqli_query($conn, $sql)) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


mysqli_close($conn);
?>