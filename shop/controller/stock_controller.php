<?php
include 'error.php';
error_reporting(0);
class stock
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
        $sql = "INSERT INTO `stock`(`shop`,`fname`, `lname`, `village`, `mobile`, `email`, `username`, `pass`) VALUES ('$shop','$fname','$lname','$village','$mobile','$email','$username','$pass')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
   /* function update($id, $course_id,$semester_id,$subject_id,$category_id,$chapter)
    {
        $sql = "UPDATE `stock` SET `course_id`='$course_id',`semester_id`='$semester_id',`subject_id`='$subject_id',`category_id`='$category_id',`chapter`='$chapter' WHERE `chapter_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }*/
    function delete($id)
    {
        $sql = "DELETE FROM `stock` WHERE `id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
            
        $sql = "SELECT chapter_id,course,semester,subject_name,category,chapter FROM `stock` INNER JOIN courses USING(course_id) INNER JOIN semesters USING(semester_id)  INNER JOIN subjects USING(subject_id) INNER JOIN category USING(category_id)";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function stockview()
    {
        $shop=$_SESSION['ID'];        
        $sql = "SELECT * FROM `stock` WHERE shop='$shop'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function totalstock()
    {
        $shop=$_SESSION['ID'];        
        $sql = "SELECT * FROM `stock` WHERE shop='$shop'";       
        $res = mysqli_query($this->db, $sql);       
        return $res;
    }

}
$obj = new stock();

if (isset($_POST['submit'])) {
    $shop= $conn->real_escape_string($_POST['shop']);
    $fname= $conn->real_escape_string($_POST['fname']);
    $lname= $conn->real_escape_string($_POST['lname']);
    $village= $conn->real_escape_string($_POST['village']);
    $mobile= $conn->real_escape_string($_POST['mobile']);
    $email= $conn->real_escape_string($_POST['email']);
    $username= $conn->real_escape_string($_POST['username']);
    $pass = $conn->real_escape_string(md5($_POST['password']));
    $res = $obj->insert($shop,$fname,$lname,$village,$mobile,$email,$username,$pass);
    if ($res) {
        header("location:stock-list.php");
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
        header("location:stock.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:stock-list.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new stock();
?>