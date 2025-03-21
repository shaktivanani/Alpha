<?php 
class users
    {
        private $db;
        private $conn = '';
        function __construct()
        {
            include 'database/db.php';
            //$conn= new mysqli('localhost','root','','saustudy');
            $this->db = $conn;
    
        }
        /*function insert($course)
        
        {
            $sql = "INSERT INTO `courses`(`course`) VALUES ('$course')";
            $res = mysqli_query($this->db, $sql);
            return $res;
        }
        function view()
        {
                
            $sql = "SELECT * FROM `users`";
            $res = mysqli_query($this->db, $sql);
            return $res;
        }*/
    }
    $obj = new users();
?>