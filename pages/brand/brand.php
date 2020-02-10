<?php

require '../../api/db.php';
if(isset($_POST['add']))
{
    $stmt=$conn->prepare("insert into  brand values (null,?);");
    $stmt->execute(array($_POST['brand']));  
}
if(isset($_POST['delete']))
{
    
    try{
    $stmt=$conn->prepare("delete from  brand where id =?;");
    $stmt->execute(array($_POST['id'])); 
    }
    catch(PDOException $e)
    {
        if(strpos($e->getmessage(), "Cannot delete or update a parent row: a foreign key constraint fails") !== false)
        echo "<script> alert('لا يمكن مسح الماركة بدون تعديل المنتج المرتبط بها '); </script>";
        
    } 
}
$stmt=$conn->prepare("select *  from brand;");
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
        <?php include '../../api/nav.php';?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            إدارة الماركات
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-plus-outline"></i>
              </span> </h3>
                    </div>

                    <div class="row">
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                                <form action="brand.php" method="POST">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <div class="col-12">

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">اسم الماركة</label>
                                                    <div class="col-10">
                                                        <input type="text" name="brand" class="form-control" value=""  required>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <a > <button type="submit" name="add" style="float:left" class="btn btn-outline-primary btn-round">إضافة</button></a>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="card-title">جدول الماركات</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> الأسم </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                for($i=0;$i<$size;$i++)
                                                {
                                               ?>
                                                <tr>

                                                    <td> <?php echo $result[$i][1];?> </td>

                                                    <td>
                                                    <form id="delete<?php echo$result[$i]['0']; ?>" action="brand.php" method="POST"> <input type="hidden" name="id" value="<?php echo$result[$i]['0']; ?>">
                                                       <button onclick="delete_add(<?php echo$result[$i]['0']; ?>);" name="delete" type="submit" style="width:50px;" class="btn btn-gradient-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-close"></i>
                                                              </button></form>
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
            <?php include '../../api/side-nav.php';?>
            <!-- partial -->

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->


    <script>
        function myFunction() {
            confirm("Press a button!");
        }
    </script>
     <script>
        function delete_add(x)
        {
            var v ='delete'+x;
            if(confirm(' سيتم مسح الماركة ! '))
            document.getElementById(v).submit();
        }
        </script>
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