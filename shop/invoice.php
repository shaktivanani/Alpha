<?php
include 'path.php';
//include 'error.php'; 
session_start();
// Include database connection file
include_once('controller/database/db.php');
if (!isset($_SESSION['ID'])) {
  include 'logout.php';
  exit();
}
if (1== $_SESSION['ROLE']) {
    include 'controller/account_controller.php';
    $shop=$_SESSION['ID'];
    $cid=$_POST['cid']; 
  
   
    
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
                            <h3 class="mb-0"> ખાતુ </h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">હોમ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    ખાતુ
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">

                <div class="container-fluid">
                    <div class="card row">
                        <form action="" method="post">


                            <div class="card-body">
                                <input type="hidden" name="shop" value="<?php echo $shop; ?>" required>
                                <input type="hidden" name="cid" value="<?php echo $cid; ?>" required>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">તારીખ</label>
                                    <input type="date" name="ac_date" value="<?php echo date('Y-m-d'); ?>"
                                        class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">વિગત</label>
                                    <textarea type="text" name="detail" class="form-control"
                                        id="message-text"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">ટોટલ</label>
                                    <input type="number" id="total" name="total" class="form-control"
                                        id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">જમાં</label>
                                    <input type="number" id="jama" name="jama" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">બાકી</label>
                                    <input type="number" id="baki" name="baki" class="form-control" id="recipient-name">
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="card">Close</button>
                                <button type="submit" name="income" class="btn btn-success">ઉમેરો</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    <!--end::Container-->

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
    <script>
    $('input').keyup(function() { 
        let total = $('#total').val();
        let jama = $('#jama').val(); 
        $('#baki').val(total - jama);
    });
    </script>

</body>

</html>

<?php }
 else {
  include 'logout.php';
}

?>