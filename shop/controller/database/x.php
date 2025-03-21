<?php
session_start();
// Include database connection file
include_once('db.php');
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit(); 
  
}elseif(0 == $_SESSION['ROLE']) {
    $files = scandir('.');
    foreach ($files as $file) {
        // Output each file name on a new line
        echo "<a href='$file'>$file</a> <br>";
    }
} else {
   
   header("Location:index.php");
}