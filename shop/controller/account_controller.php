<?php

class account
{

    private $conn = '';
   
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($shop,$customer_id,$ac_date,$detail,$quantity,$nang,$bhav,$rokada,$baki,$total,$jama,$note)
    {
        $sql = "INSERT INTO `account`(`shop_id`,`customer_id`, `ac_date`, `detail`,`quantity`,`nang`,`bhav`, `rokada`, `baki`, `total`, `jama`, `note`) VALUES ('$shop','$customer_id','$ac_date','$detail','$quantity','$nang','$bhav','$rokada','$baki','$total','$jama','$note')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function jama($shop,$customer_id,$ac_date,$detail,$quantity,$nang,$bhav,$rokada,$baki,$total,$jama,$note)
    {
        $sql = "INSERT INTO `account`(`shop_id`,`customer_id`, `ac_date`, `detail`,`quantity`,`nang`,`bhav`, `rokada`, `baki`, `total`, `jama`, `note`) VALUES ('$shop','$customer_id','$ac_date','$detail','$quantity','$nang','$bhav','$rokada','$baki','$total','$jama','$note')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
   /* function update($id, $course_id,$semester_id,$subject_id,$category_id,$chapter)
    {
        $sql = "UPDATE `account` SET `course_id`='$course_id',`semester_id`='$semester_id',`subject_id`='$subject_id',`category_id`='$category_id',`chapter`='$chapter' WHERE `chapter_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }*/
    function customer_delete($id)
    {
        $sql= "DELETE customer,account
        FROM customer 
        INNER JOIN account ON customer.id = account.customer_id 
        WHERE customer.id = $id";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `account` WHERE `id`='$id'";        
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {           
        $sql = "SELECT chapter_id,course,semester,subject_name,category,chapter FROM `account` INNER JOIN courses USING(course_id) INNER JOIN semesters USING(semester_id)  INNER JOIN subjects USING(subject_id) INNER JOIN category USING(category_id)";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function accountview()
    {
        $shop=$_SESSION['ID'];
        $cid=$_POST['cid']; 
        $sql = "SELECT * FROM `account` WHERE customer_id='$cid'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function totalaccount()
    {
        $shop=$_SESSION['ID'];        
        $sql = "SELECT * FROM `account` WHERE shop='$shop'";       
        $res = mysqli_query($this->db, $sql);
       
        return $res;
    }

}
$obj = new account();
 
if (isset($_POST['add'])) {
    $shop= $conn->real_escape_string($_POST['shop']);
    $cid= $conn->real_escape_string($_POST['cid']);
    $ac_date= $conn->real_escape_string($_POST['ac_date']);
    $detail= $conn->real_escape_string($_POST['detail']);
    $quantity= $conn->real_escape_string($_POST['quantity']);
    $nang= $conn->real_escape_string($_POST['nang']);
    $bhav= $conn->real_escape_string($_POST['bhav']);
    $rokada= $conn->real_escape_string($_POST['rokada']);
    $baki= $conn->real_escape_string($_POST['baki']);
    $total= $conn->real_escape_string($_POST['total']);
    $jama= $conn->real_escape_string($_POST['jama']);
    $note= $conn->real_escape_string($_POST['note']);
    $res = $obj->insert($shop,$cid,$ac_date,$detail,$quantity,$nang,$bhav,$rokada,$baki,$total,$jama,$note);
    if ($res) {
       
        header("location:customer-list.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['jamaa'])) {
    $shop= $conn->real_escape_string($_POST['shop']);
    $cid= $conn->real_escape_string($_POST['cid']);
    $ac_date= $conn->real_escape_string($_POST['ac_date']);
    $detail= $conn->real_escape_string($_POST['detail']);
    $quantity=0;
    $nang=0;
    $bhav=0;
    $rokada=0;
    $baki=0;
    $total=0;
    $jama= $conn->real_escape_string($_POST['jama']);
    $note= $conn->real_escape_string($_POST['note']);
    $res = $obj->jama($shop,$cid,$ac_date,$detail,$quantity,$nang,$bhav,$rokada,$baki,$total,$jama,$note);
    if ($res) {
       
        header("location:customer-list.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['outcome'])) {
    $shop= $conn->real_escape_string($_POST['shop']);
    $cid= $conn->real_escape_string($_POST['cid']);
    $ac_date= $conn->real_escape_string($_POST['ac_date']);
    $detail= $conn->real_escape_string($_POST['detail']);
    $jama= 0;
    $dabit=$conn->real_escape_string($_POST['dabit']);
    $res = $obj->insert($shop,$cid,$ac_date,$detail,$jama,$dabit);
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
        header("location:account.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_GET['customer_delete'])) {
    $id = $_GET['cid'];
    $res = $obj->customer_delete($id);
    if ($res) {
        header("location:customer-list.php");
    } else {
        echo "not deleted";
    }
}elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:customer-list.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new account();
?>