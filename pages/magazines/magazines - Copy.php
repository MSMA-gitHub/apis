<?php
require '../../api/db.php';
$stmt = $conn->prepare("select magazine.id,title,end_date,count(photo)  from magazine inner join magazine_photo on magazine.id= magazine_photo.id  GROUP by magazine_photo.id order by end_date desc
;");
$stmt->execute();
$magazine = $stmt->fetchAll();
$m_size = $stmt->rowcount();
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orody Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link rel="stylesheet" href="../../assets/\css\dataTables.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="../../assets/images/favicon.png">
</head>

<body class="">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include'../../api/nav.php';?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            إدارة النشرات
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-newspaper menu-icon"></i>
              </span> </h3>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                            <a href="addMagazine.html"><button type="button" class="btn btn-outline-info btn-icon-text"> إضافة نشرة </button></a>
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-title">جدول النشرات</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> عنوان النشرة </th>
                                                    <th> المتجر </th>
                                                    <th> عدد الصفح </th>
                                                    <th> تاريخ الانتهاء </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
for ($i = 0; $i < $m_size; $i++) {
    $stmt = $conn->prepare("select name  from store where id in (select store from magazine_branch where id = ? ) ;");
    $stmt->execute(array($magazine[$i][0]));
    $store = $stmt->fetchAll();
    ?>
                                                <tr>
                                                    <td>
                                                       <?php echo $magazine[$i][1]; ?></td>
                                                       <td><?php echo $store[0][0]; ?></td>
                                                    <td> <?php echo $magazine[$i][3] + 1; ?></td>
                                                    <td> <?php echo $magazine[$i][2]; ?> </td>
                                                    <td>
                                                        <div class="row">
                                                        <form id="magazine<?php echo $magazine[$i][0]; ?>" action="../magazines/magazine.php" method="POST"> <input type="hidden" name="id" value="<?php echo $magazine[$i][0]; ?>">
                                                       <a onclick="document.getElementById('magazine<?php echo $magazine[$i][0]; ?>').submit();"><label class="badge badge-gradient-info">صفحه النشره</label></a></form>
                                                             <a style="width:30px"></a>
                                                             <form id="deleteM<?php echo $magazine[$i][0]; ?>" action="../../api/magazine/delete_magazine.php" method="POST"> <input type="hidden" name="id" value="<?php echo $magazine[$i][0]; ?>">
                                                       <button onclick="delete_magazine(<?php echo $magazine[$i][0]; ?>);"  type="button" style="width:50px;" class="btn btn-gradient-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-close"></i>
                                                              </button></form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
}?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- partial -->
            </div>
            <!-- partial:partials/_sidebar.html -->
            <?php include'../../api/side-nav.php';?>
            <!-- partial -->

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->



    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function() {
            $('#tableId').DataTable();
        });
    </script>
</body>

</html>