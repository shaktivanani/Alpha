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
if (1 == $_SESSION['ROLE']) {
    include 'controller/account_controller.php';
    $shop=$_SESSION['ID'];
    $cid=$_GET['cid']; 
  
   
    
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

                <div class="container">
                <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">ખાતાની માહિતી</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form> <!--begin::Body-->
                                    <div class="card-body">
                                    <?php
                                        $sql = "SELECT * FROM `customer` WHERE id='$cid'";
                                        $res = mysqli_query($conn, $sql);
                                        
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                ?>
                                        <div class="row mb-3"> <label class="col-sm-3 col-2 col-form-label">ખાતા નંબર:</label>
                                            <div class="col-sm-9 col-10"> <input type="text" class="form-control" value="<?php echo $row["id"]; ?>" readonly></div>
                                        </div>
                                        <div class="row mb-3"> <label class="col-sm-3 col-2 col-form-label">નામ:</label>
                                            <div class="col-sm-9"> <input type="text" class="form-control" value="<?php echo $row["fname"]; ?> <?php echo $row["lname"]; ?>" readonly></div>
                                        </div>
                                        <div class="row mb-3"> <label class="col-sm-3  col-2 col-form-label">ગામ:</label>
                                            <div class="col-sm-9"> <input type="text" class="form-control" value="<?php echo $row["village"]; ?>" readonly></div>
                                        </div>
                                        <div class="row mb-3"> <label class="col-sm-3 col-2 col-form-label">મોબાઈલ:</label>
                                            <div class="col-sm-9"> <input type="text" class="form-control" value="<?php echo $row["mobile"]; ?>" readonly></div>
                                        </div>
                                        <div class="row mb-3"> <label class="col-sm-3 col-2 col-form-label">ઈ-મેઈલ:</label>
                                            <div class="col-sm-9"> <input type="text" class="form-control" value="<?php echo $row["email"]; ?>" readonly></div>
                                        </div>
                                       
                                        <?php } ?>
                                        
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                 </form> <!--end::Form-->
                            </div>

                    <!--begin::Row-->
                    
                    <!--end::Row-->
                    <!-- =========================================================== -->
                    <h5 class="mt-4 mb-2"></h5>

                    <!--begin::Row-->
                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-6">
                            <div type="button" class="info-box  text-bg-info bg-gradient " data-bs-toggle="modal"
                                data-bs-target="#add"><span class="info-box-icon"> <i class="bi  bi-patch-plus"></i>
                                </span>
                                <div class="info-box-content"> <span class="info-box-text">ઉમેરો</span>
                                </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                        <div class="col-md-6 col-sm-6 col-6">
                            <div type="button" class="info-box text-bg-primary bg-gradient" data-bs-toggle="modal"
                                data-bs-target="#jama"> <span class="info-box-icon"> <i class="bi bi-patch-plus"></i>
                                </span>
                                <div class="info-box-content"> <span class="info-box-text">જમાં</span>
                                </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                        <?php
                        $sql = "SELECT * FROM `account` WHERE customer_id='$cid'";
                        $res = mysqli_query($conn, $sql); 
                            $kultotal=0;
                            $kuljama=0;
                            $kulrokada=0;
                            $jamarakam=0;
                           
                            $kulbaki=0;
                            
                        while ($row = mysqli_fetch_assoc($res)) {
                            $kultotal += $row['total'];                           
                            $kulrokada += $row['rokada'];
                            $kuljama += $row['jama'];

                        }
                            $jamarakam=$kuljama+$kulrokada;
                            $baki=$kultotal-$jamarakam;
                           

                           
                           
                           
                            ?>


                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="info-box text-bg-warning bg-gradient"> <span class="info-box-icon"> <i
                                        class="bi bi-currency-rupee"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">કુલ રકમ</span> <span
                                        class="info-box-number h2"><?php echo $kultotal; ?></span>
                                </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="info-box text-bg-success bg-gradient"> <span class="info-box-icon"> <i
                                        class="bi bi-currency-rupee"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">જમાં રકમ</span> <span
                                        class="info-box-number h2"><?php echo $jamarakam; ?></span>
                                </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="info-box text-bg-danger bg-gradient"> <span class="info-box-icon"> <i
                                        class="bi bi-currency-rupee"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">બાકી રકમ</span> <span
                                        class="info-box-number h2"><?php echo $baki; ?></span>
                                </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                    </div>
                    <!--end::Row-->
                    <!-- =========================================================== -->


                </div>
                <div class="container">
                    <div class="row card text-center">
                        <div class="card-hader h3 p-0 m-2">
                            ખાતાની વિગતો
                        </div>

                        <div class="card-body  table-responsive p-0 m-2">
                            <table id="example" class="table table-striped table-bordered border-primary ">
                                <thead>
                                    <tr>
                                        <th style="width: 5px">#</th>
                                        <th>તારીખ</th>
                                        <th>વિગત</th>
                                        <th>ML/ગ્રામ</th>
                                        <th>નંગ</th>
                                        <th>ભાવ</th>
                                        <th>કુલ-રકમ</th>
                                        <th>રોકડા</th>
                                        <th>બાકી</th>
                                        <th>જમા</th>
                                        <th>નોંધ</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        
                                        $sql = "SELECT * FROM `account` WHERE customer_id='$cid'";
                                        $res = mysqli_query($conn, $sql);
                                             $netbalance=0;
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                ?>

                                    <tr class="align-middle">
                                        <td> <?php echo $row["id"]; ?></td>
                                        <td> <?php echo $row["ac_date"]; ?></td>
                                        <td><?php echo $row["detail"]; ?></td>
                                        <td><?php echo $row["quantity"]; ?></td>
                                        <td><?php echo $row["nang"]; ?></td>
                                        <td><?php echo $row["bhav"]; ?></td>
                                        <td class=""><?php echo  $row["total"]; ?></td>
                                        <td class="text-success"><?php echo $row["rokada"]; ?></td>
                                        <td class="text-danger"><?php echo $row["baki"]; ?></td>
                                        <td class="text-success"><?php echo  $row["jama"]; ?></td>
                                        <td class=""><?php echo  $row["note"]; ?></td>
                                        <td>
                                        <form action="account.php" method="POST">
                                                        <input type="number" value="<?php echo $row["id"]; ?>"  name="id" hidden>
                                                        
                                                        <button class="btn btn-warning" type="submit" name=""
                                                            onclick="return confirm('are you sure to edit')"><i
                                                                class="bi bi-pencil-square"></i></button>

                                                        <button class="btn btn-danger" type="submit" name="delete"
                                                            onclick="return confirm('are you sure to delete')"><i
                                                                class="bi bi-trash3"></i></button>
                                                    </form>
                                        </td>


                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
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
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">આવક</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">


                    <div class="modal-body">
                        <input type="hidden" name="shop" value="<?php echo $shop; ?>" required>
                        <input type="hidden" name="cid" value="<?php echo $cid; ?>" required>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">તારીખ</label>
                            <input type="date" name="ac_date" value="<?php echo date('Y-m-d'); ?>" class="form-control"
                                id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">વિગત</label>
                            <textarea type="text" name="detail" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">ML/ગ્રામ</label>
                                <input type="number" id="quantity" name="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">નંગ</label>
                                <input type="number" id="nang" name="nang" class="form-control">
                            </div>
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">ભાવ</label>
                                <input type="number" id="bhav" name="bhav" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">ટોટલ</label>
                                <input type="number" id="total" name="total" class="form-control">
                            </div>

                            <div class="col">
                                <label for="recipient-name" class="col-form-label">રોકડા</label>
                                <input type="number" id="rokada" name="rokada" class="form-control text-success">
                            </div>
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">બાકી</label>
                                <input type="number" id="baki" name="baki" class="form-control text-danger">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">નોંધ</label>
                            <textarea type="text" name="note" class="form-control"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-success">ઉમેરો</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="jama" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">આવક</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="shop" value="<?php echo $shop; ?>" required>
                        <input type="hidden" name="cid" value="<?php echo $cid; ?>" required>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">તારીખ</label>
                            <input type="date" name="ac_date" value="<?php echo date('Y-m-d'); ?>" class="form-control"
                                id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">વિગત</label>
                            <textarea type="text" name="detail" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">જમાં</label>
                            <input type="number" id="jama" name="jama" class="form-control text-success">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">નોંધ</label>
                            <textarea type="text" name="note" class="form-control"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="jamaa" class="btn btn-success">ઉમેરો</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'js.php'; ?>
    <script>
    $('input').keyup(function() {
        let nang = $('#nang').val();
        let bhav = $('#bhav').val();
        $('#total').val(nang * bhav);
        let total = $('#total').val();
        let rokada = $('#rokada').val();
        $('#baki').val(total - rokada);
    });
    </script>
</body>

</html>

<?php }
 else {
  include 'logout.php';
}

?>