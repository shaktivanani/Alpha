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
    include 'controller/customer_controller.php';
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
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0"> બધા ગ્રાહક </h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">હોમ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    બધા ગ્રાહક
                                </li>
                            </ol>
                        </div>
                        <?php
                    // Display error message if it is set
                    if (!empty($errorMsg)) {
                        echo "<div class='alert alert-danger' role='alert'>$errorMsg</div>";
                    }
                    ?>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">બધા ગ્રાહક </h3>
                                    <a href="add-customer.php"
                                        class="btn btn-primary position-absolute top-0 end-0 m-2"> નવા ગ્રાહક ઉમેરો</a>
                                </div> <!-- /.card-header -->
                                <div class="card-body p-0 m-2 table-responsive">
                                    <table id="example" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th style="width: 80px">ગ્રાહક નંબર</th>
                                                <th>ગ્રાહકનુ નામ</th>
                                                <th>યુજરનેમ</th>
                                                <th>મોબાઈલ નંબર</th>
                                                <th>ઈ-મેઈલ</th>
                                                <th>રકમ</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        //$shop=$_SESSION['ID']; echo $shop;
                                        $data = $obj->customerview();
                                        while ($row = mysqli_fetch_assoc($data)) {
                                            ?>
                                            <tr class="align-middle">
                                                <td>1</td>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td>
                                                    <?php echo $row["fname"]; ?> <?php echo $row["lname"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["username"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["mobile"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["email"]; ?>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <form action="account.php" method="GET">
                                                        <input type="number" value="<?php echo $row["id"]; ?>"
                                                            name="cid" hidden>
                                                        <button class="btn btn-warning" type="submit" name=""><i
                                                                class="bi bi-eye"></i></button>
                                                        <button class="btn btn-warning" type="submit" name=""
                                                            onclick="return confirm('are you sure to edit')"><i
                                                                class="bi bi-pencil-square"></i></button>

                                                        <button class="btn btn-danger" type="submit" name="customer_delete"
                                                            onclick="return confirm('are you sure to delete')"><i
                                                                class="bi bi-trash3"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->

                    </div>
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        <?php include "footer.php"; ?>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->

    <?php include 'js.php'; ?>
</body>

</html>

<?php } else {
  include 'logout.php';
}

?>