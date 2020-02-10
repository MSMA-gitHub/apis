<?php
require '../../api/db.php';
$stmt=$conn->prepare("select *,store,branch,add_id  from addvertisement inner join addvertisement_branch on addvertisement.id =addvertisement_branch.id ;");
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowcount();
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
                            إدارة الاعلانات
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-xaml menu-icon"></i>
              </span> </h3>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                            <a href="addAd.php"><button type="button" class="btn btn-outline-info btn-icon-text"> إضافة اعلان </button></a>
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-title">جدول الاعلانات</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> الاعلان </th>
                                                    <th> المنتح </th>
                                                    <th> المتجر </th>
                                                    <th> الفرع </th>
                                                    <th> تاريخ البداية </th>
                                                    <th> تاريخ النهاية </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for($i=0;$i<$size;$i++)
                                                {
                                                    $stmt=$conn->prepare("select name  from product where id= ?;");
                                                    $stmt->execute(array($result[$i][1]));
                                                    $p=$stmt->fetchAll();
                                                    $stmt=$conn->prepare("select name  from store where id= ?;");
                                                    $stmt->execute(array($result[$i]['store']));
                                                    $s=$stmt->fetchAll();
                                                    $stmt=$conn->prepare("select branch  from store_branch where id= ?;");
                                                    $stmt->execute(array($result[$i]['branch']));
                                                    $b=$stmt->fetchAll();
                                               ?>
                                                <tr>
                                                    <td>
                                                        <img src="../../api/<?php echo $result[$i]['photo'];?>" class="mb-2 mh-50 rounded" alt="image">  </td>
                                                    <td> <?php echo  $p[0][0];?>  </td>
                                                    <td> <?php echo $s[0][0];?> </td>
                                                    <td> <?php echo $b[0][0];?> </td>
                                                    <td> <?php echo $result[$i][2];?> </td>
                                                    <td> <?php echo $result[$i][3];?> </td>
                                                    <td>
                                                        <div class="row">
                                                        <form id="add<?php echo$result[$i]['add_id']; ?>" action="editAdd.php" method="POST"> <input type="hidden" name="id" value="<?php echo$result[$i]['add_id']; ?>">
                                                       <a onclick="document.getElementById('add<?php echo$result[$i]['add_id']; ?>').submit();"><label class="badge badge-gradient-info">صفحه الاعلان</label></a></form>
                                                             <a style="width:30px"></a>
                                                             <form id="delete<?php echo$result[$i]['add_id']; ?>" action="../../api/adds/deletead.php" method="POST"> <input type="hidden" name="id" value="<?php echo$result[$i]['add_id']; ?>">
                                                       <button onclick="delete_add(<?php echo$result[$i]['add_id']; ?>);"  type="button" style="width:50px;" class="btn btn-gradient-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-close"></i>
                                                              </button></form>
                                                        </div>
                                                    </td>
                                                </tr>
                                              <?php
                                                }
                                                ?>
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
    <script>
        function delete_add(x)
        {
            var v ='delete'+x;
            if(confirm(' سيتم مسح الاعلان ! '))
            document.getElementById(v).submit();
        }
        </script>
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function() {
            $('#tableId').DataTable();
        });
    </script>
</body>

</html>