<?php
include 'error.php';
error_reporting(0);
class customer
{

    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($shop,$fname,$lname,$village,$mobile,$email,$username,$pass)
    {   
            $sql = "SELECT * FROM customer WHERE email='$email' OR username='$username'";
            $res = mysqli_query($this->db, $sql);

            if ($res->num_rows > 0) {
                echo "Username or email already exists. Please try with a different one.";
                header("Location:add-customer.php");
            } else {
                // Insert new user
                $insertsql = "INSERT INTO `customer`(`shop`,`fname`, `lname`, `village`, `mobile`, `email`, `username`, `pass`) VALUES ('$shop','$fname','$lname','$village','$mobile','$email','$username','$pass')";
                if ($res = mysqli_query($this->db, $insertsql) === TRUE) {
                    
                   
                    $errorMsg = "Thank You! I will be in touch.";
               
                    header("Location:customer-list.php");
                } else {
                    $errorMsg = "Sorry there was an error sending your message. Please try again later";
                 }
            }
    }
    function customerview()
    {
        $shop=$_SESSION['ID'];        
        $sql = "SELECT * FROM `customer` WHERE shop='$shop'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function ac()
    {
        $shop=$_SESSION['ID'];        
       // $sql = "SELECT * FROM `account` INNER JOIN customer USING(customer_id)  WHERE shop='$shop'";
       $sql=" SELECT * FROM `account` FULL JOIN customer ON account.customer_id=id WHERE shop='$shop'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    
    function totalcustomer()
    {
        $shop=$_SESSION['ID'];        
        $sql = "SELECT * FROM `customer` WHERE shop='$shop'";       
        $res = mysqli_query($this->db, $sql);       
        return $res;
    }

}
$obj = new customer();

if (isset($_POST['submit'])) {
    $shop= $conn->real_escape_string($_POST['shop']);
    $fname= $conn->real_escape_string($_POST['fname']);
    $lname= $conn->real_escape_string($_POST['lname']);
    $village= $conn->real_escape_string($_POST['village']);
    $mobile= $conn->real_escape_string($_POST['mobile']);
    $email= $conn->real_escape_string($_POST['email']);
    $username= $conn->real_escape_string($_POST['username']);
    $pass = $conn->real_escape_string(md5($_POST['password']));
    $createat = $conn->$_POST['createat'];
    $res = $obj->insert($shop,$fname,$lname,$village,$mobile,$email,$username,$pass);
    if ($res) {
        header("location:customer-list.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $course_id = $_POST['course_id'];
    $semester_id=$_POST['semester_id'];
    $subject_id=$_POST['subject_id'];
    $category_id=$_POST['category_id'];
    $chapter=$_POST['chapter'];

    $res = $obj->update($id, $course_id,$semester_id,$subject_id,$category_id,$chapter);
    if ($res) {
        header("location:customer.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:customer-list.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new customer();
?>