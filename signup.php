<?php 
include 'path.php';
include 'admin/controller/database/db.php'; 
include 'admin/error.php';
if (isset($_POST['submit'])) {
    
 
  $fname= $conn->real_escape_string($_POST['fname']);
  $lname= $conn->real_escape_string($_POST['lname']);
  $email= $conn->real_escape_string($_POST['email']);
  $username= $conn->real_escape_string($_POST['username']);
  $pass = $conn->real_escape_string(md5($_POST['password']));
  $sql = "SELECT * FROM users WHERE email='$email' OR username='$username'";
  $res = mysqli_query($this->db, $sql);

  if ($res->num_rows > 0) {
      echo "Username or email already exists. Please try with a different one.";
      header("Location:add-customer.php");
  } else {
      // Insert new user
      $insertsql = "INSERT INTO `users`(`fname`, `lname`, `email`, `username`, `pass`) VALUES ('$fname','$lname','$email','$username','$pass')";
      $res = mysqli_query($this->db, $insertsql);
      if ($res===TRUE) {          
          echo "Registration successful!";
          header("Location:index.php");
      } else {
        $errorMsg= "Error: " . $insertsql . "<br>" . $conn->error;
      }
  }
  //$role     = $conn->real_escape_string($_POST['role']);
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $pn; ?>|Signup</title>
  <?php include($path.'/admin/css.php'); ?>


</head>

<body class="login-page bg-body-secondary">
<div class="register-box">
        <div class="register-logo"> <a href="index.php"><b>Alpha</b></a> </div> <!-- /.register-logo -->
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>
                <form action="" method="post">
                    <div class="input-group mb-3"> <input type="text" nam="fname" class="form-control" placeholder="Name">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="text" name="lname" class="form-control" placeholder="surname">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="text" name="username" class="form-control" placeholder="User Name">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div> <!--begin::Row-->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                    I agree to the <a href="#">terms</a> </label> </div>
                        </div> <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2"> <button type="submit" name="submit" class="btn btn-primary">Sign In</button> </div>
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </form>
                <div class="social-auth-links text-center mb-3 d-grid gap-2">
                    <a href="index.php" class="btn btn-primary"> I already have a membership </a>
                </div> 
            </div> <!-- /.register-card-body -->
        </div>
    </div> <!-- /.register-box --> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include($path.'/admin/js.php'); ?> 
</body>

</html>