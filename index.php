<?php
include 'path.php';
include 'shop/error.php';
session_start();
if (isset($_SESSION['ID'])) {
  header("Location:shop/dashboard.php");
  exit();
}
// Include database connectivity

include_once('shop/controller/database/db.php');

if (isset($_POST['submit'])) {
  $errorMsg = "";
  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string(md5($_POST['password']));

  if (!empty($username) || !empty($password)) {
    $sql  = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['ID'] = $row['id'];
      $_SESSION['ROLE'] = $row['user_role'];
      $_SESSION['USERNAME'] = $row['username'];
      if(1 == $row['user_role']) {
        header("Location:shop/index.php");
      } elseif (0 == $row['user_role']) {
        header("Location:Contact.php");
    }
      die();
    } else {
      $errorMsg = "No user found on this username";
    }
  } else {
    $errorMsg = "Username and Password is required";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pn; ?></title>
  <?php include($path . '/shop/css.php'); ?>

</head>

<body class="login-page bg-body-secondary">

  <div class="login-box">
    <div class="login-logo"> <a href="index.php"><b>Alpha</b></a> </div> <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="POST">
          <div class="input-group mb-3"> <input type="text" class="form-control" name="username" placeholder="username">
            <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
          </div>
          <div class="input-group mb-3"> <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
          </div> <!--begin::Row-->
          <div class="row">
            <div class="col-6">
              <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                  Remember Me
                </label> </div>
            </div> <!-- /.col -->
            <div class="col-6">
              <div class="d-grid gap-2"> <button type="submit" name="submit" class="btn btn-primary">Sign In</button> </div>
            </div> <!-- /.col -->
          </div> <!--end::Row-->
        </form>
        <div class="social-auth-links text-center mb-3 d-grid gap-2">
          <p>- OR -</p> <a href="#" class="btn btn-primary"> <i class="bi bi-password me-2"></i> I forgot my password
          </a> <a href="signup.php" class="btn btn-danger"> <i class="bi bi-memer me-2"></i> Register a new membership
          </a>
        </div> <!-- /.social-auth-links -->
        
      </div> <!-- /.login-card-body -->
    </div>
  </div> <!-- /.login-box --> <!--begin::Third Party Plugin(OverlayScrollbars)-->






  <?php include($path . '/shop/js.php'); ?>
</body>

</html>