<?php 
require '../../api/db.php';
$sql = "SELECT  subcategory.id,subcategory.`name`,category.name,category.photo,category.type,subcategory.image FROM `subcategory` INNER join category on category.id=subcategory.categoryid";
$stmt=$conn->prepare($sql);
$stmt->execute();
$size=$stmt->rowCount();
$result=$stmt->fetchAll();
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
                            إدارة الفئات
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
                                            <a href="addSubCategory.php"><button type="button" class="btn btn-outline-info btn-icon-text"> إضافة فئة جانبية </button></a>
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-title">جدول الفئات</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> الاسم </th>
                                                    <th> القسم </th>
                                                    <th> الفئه التابع لها </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for($i=0;$i<$size;$i++)
                                                {
                                                    ?>
                                                <tr>

                                                    <td><img src="../../api/<?php echo $result[$i][5];?>" class="mb-2 mh-50" alt="image"> <?php echo $result[$i][1];?>  </td>
                                                    <td> <?php if($result[$i][4]==0) echo"الفئات";
                                                    else echo "قائمة التسوق"; ?> </td>
                                                    <td><img src="../../api/<?php echo $result[$i][3];?>" class="mb-2 mh-50" alt="image"><?php echo $result[$i][2];?> </td>
                                                    <td>
                                                    <form id="cat<?php echo$result[$i][0]; ?>" action="editSubCategory.php" method="POST"> <input type="hidden" name="id" value="<?php echo$result[$i][0]; ?>">
                                                       <a onclick="document.getElementById('cat<?php echo$result[$i][0]; ?>').submit();"><label class="badge badge-gradient-info"> صفحة القسم </label></a></form>

                                                   
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
</body>

</html>