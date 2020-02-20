<?php
require '../../api/db.php';
$stmt = $conn->prepare("select code.id,code.code,type,data,title,photo,end_date,store_id  from code inner join store_code on code.id=store_code.code  where  type = 0 or type = 1 group by code.id;");
$stmt->execute();
$code = $stmt->fetchAll();
$c_size = $stmt->rowcount();
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
                            إدارة الأكواد
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cart-outline menu-icon"></i>
              </span> </h3>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                            <a href="addCoupon.php"><button type="button" class="btn btn-outline-info btn-icon-text"> إضافة كوبون </button></a>
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-title">جدول الأكواد</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> الكوبون </th>
                                                    <th> المتجر </th>
                                                    <th>صورة الكوبون </th>
                                                    <th> نوع الكوبون </th>
                                                    <th> الكود </th>
                                                    <th> تاريخ الانتهاء </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                for($i=0;$i<$c_size;$i++)
                                                {
                                                    $stmt = $conn->prepare("select name  from  store where id= ?;");
                                                    $stmt->execute(array($code[$i]['store_id']));
                                                    $store = $stmt->fetchAll();
                                                     ?>
                                                <tr>
                                                    <td><?php echo $code[$i]['title'];?>
                                                        </td>
                                                        <td><?php echo $store[0][0];?>
                                                        </td>
                                                        <td>
                                                        <img src="../../api/<?php echo $code[$i]['photo'];?>" class="mb-2 mh-50 rounded" alt="image">  </td>
                                                    <td> <?php if($code[$i]['type']==0)
                                                    echo 'خصم مبلغ';
                                                    elseif($code[$i]['type']==1)
                                                    echo'خصم نسبة ';
                                                    ?> </td>
                                                    <td> <?php echo $code[$i]['code'];?> </td>
                                                    <td> <?php echo $code[$i]['end_date'];?> </td>
                                                    <td>
                                                        <div class="row">
                                                        <form id="code<?php echo $code[$i][0]; ?>" action="../coupons/coupon.php" method="POST"> <input type="hidden" name="id" value="<?php echo $code[$i][0]; ?>">
                                                       <a onclick="document.getElementById('code<?php echo $code[$i][0]; ?>').submit();"><label class="badge badge-gradient-info">صفحه الكود</label></a></form>
                                                             <a style="width:30px"></a>
                                                             <form id="deleteC<?php echo $code[$i]['id']; ?>" action="../../api/code/deletecode.php?i=0" method="POST"> <input type="hidden" name="id" value="<?php echo $code[$i]['id']; ?>">
                                                       <button onclick="delete_code(<?php echo $code[$i]['id']; ?>);"  type="button" style="width:50px;" class="btn btn-gradient-danger btn-rounded btn-icon">
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
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function() {
            $('#tableId').DataTable();
        });
    </script>
      <script>
        function delete_code(x)
        {
            var v ='deleteC'+x;
            if(confirm(' سيتم مسح البيانات ! '))
            document.getElementById(v).submit();
        }
        </script>
</body>

</html>