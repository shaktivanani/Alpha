<?php
include 'path.php';
include 'error.php';
session_start();
// Include database connection file
include_once('controller/database/db.php');
if (!isset($_SESSION['ID'])) {
  include 'logout.php';
  exit();
}
if (1 == $_SESSION['ROLE']) {
    $shop=$_SESSION['ID'];
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ડેશબોર્ડ</title>
    <?php include 'css.php'; ?>
  </head>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
   
  <div class="app-wrapper">
         <!--begin::Header-->
          <?php include "header.php"; ?>
         <!--end::Header--> 
         <!--begin::Sidebar-->
          <?php include "menu.php"; ?>
         <!--end::Sidebar-->
         
        <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0"> પ્રોફાઈલ </h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">હોમ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    પ્રોફાઈલ 
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
            <div class="container">
                <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">મારી પ્રોફાઈલ</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form> <!--begin::Body-->
                                    <div class="card-body">
                                    <?php
                                        $sql = "SELECT * FROM `users` WHERE id='$shop'";
                                        $res = mysqli_query($conn, $sql);
                                        
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                ?>
                                       
                                        <div class="row mb-3"> <label class="col-sm-3 col-2 col-form-label">નામ:</label>
                                            <div class="col-sm-9"> <input type="text" class="form-control" value="<?php echo $row["fname"]; ?> <?php echo $row["lname"]; ?>" readonly></div>
                                        </div>
                                        <div class="row mb-3"> <label class="col-sm-3  col-2 col-form-label">યુઝરનેમ:</label>
                                            <div class="col-sm-9"> <input type="text" class="form-control" value="<?php echo $row["username"]; ?>" readonly></div>
                                        </div>                                       
                                        <div class="row mb-3"> <label class="col-sm-3 col-2 col-form-label">ઈ-મેઈલ:</label>
                                            <div class="col-sm-9"> <input type="text" class="form-control" value="<?php echo $row["email"]; ?>" readonly></div>
                                        </div>
                                       
                                        <?php } ?>
                                        
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                 </form> <!--end::Form-->
                            </div>

                    <!--begin::Row-->
                   
                </div>
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
       <!--begin::Footer-->
       <?php include "footer.php"; ?>
       <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
   
  <?php include 'js.php'; ?>
  </body>

  </html>

<?php } else {
  include 'logout.php';
}

?>