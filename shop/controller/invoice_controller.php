<?php

class invoice
{

    private $conn = '';
   
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($shop,$customer_id,$ac_date,$detail,$cradit,$dabit)
    {
        $sql = "INSERT INTO `invoice`(`shop_id`,`customer_id`, `ac_date`, `detail`, `cradit`, `dabit`) VALUES ('$shop','$customer_id','$ac_date','$detail','$cradit','$dabit')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }

}
$obj = new invoice();
 
if (isset($_POST['income'])) {
    $shop= $conn->real_escape_string($_POST['shop']);
    $cid= $conn->real_escape_string($_POST['cid']);
    $ac_date= $conn->real_escape_string($_POST['ac_date']);
    $detail= $conn->real_escape_string($_POST['detail']);
    $cradit= $conn->real_escape_string($_POST['cradit']);
    $dabit=0;
    $res = $obj->insert($shop,$cid,$ac_date,$detail,$cradit,$dabit);
    if ($res) {
       
        header("location:customer-list.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}

//$obj1=new invoice();
?>