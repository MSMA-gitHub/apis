<?php

require '../../api/db.php';
$stmt = $conn->prepare("select *  from country order by country;");
$stmt->execute();
$countries_size = $stmt->rowcount();

$stmt=$conn->prepare("select *  from city order by countrycode;");
$stmt->execute();
$size=$stmt->rowcount();
if (isset($_POST['add_country'])) {
    $stmt = $conn->prepare("insert into  country values (?,?,?);");
    $stmt->execute(array($countries_size+61,$_POST['country'],$_POST['code']));
}
if (isset($_POST['add_city'])) {
    $stmt = $conn->prepare("insert into  city values (?,?,?);");
    $stmt->execute(array($size+239,$_POST['city'],$_POST['country_code']));
}
if (isset($_POST['delete_country'])) {

        $stmt = $conn->prepare("delete from  country where id =?;");
        $stmt->execute(array($_POST['id']));

}
if (isset($_POST['delete_city'])) {

    $stmt = $conn->prepare("delete from  city where id =?;");
    $stmt->execute(array($_POST['C_id']));

}
$stmt = $conn->prepare("select *  from country order by country ASC ;");
$stmt->execute();
$countries = $stmt->fetchAll();
$countries_size = $stmt->rowcount();

$stmt=$conn->prepare("select *  from city order by countrycode Asc ;");
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
        <?php include '../../api/nav.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            إدارة الدول المدن
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-city"></i>
                            </span> </h3>
                    </div>

                    <div class="row">
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                                <form action="basicData.php" method="POST">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <div class="col-12">

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">اسم الدولة</label>
                                                    <div class="col-10">
                                                        <input type="text" name="country" class="form-control" value="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">كود الدولة</label>
                                                    <div class="col-10">
                                                        <input type="number" name="code" class="form-control" value="" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <a> <button type="submit" name="add_country" style="float:left" class="btn btn-outline-primary btn-round">إضافة</button></a>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                                <form action="basicData.php" method="POST">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <div class="col-12">

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">اسم المدينة</label>
                                                    <div class="col-10">
                                                        <input type="text" name="city" class="form-control" value="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label"> الدولة التابعة لها</label>
                                                    <div class="col-10"><select name="country_code" id="country" class="form-control">
                                                            <option value="null">اختر الدولة</option>
                                                            <?php
                                                            for ($i = 0; $i < $countries_size; $i++) {
                                                                echo '<option value="' . $countries[$i][0] . '">' . $countries[$i][1] . '</option>';
                                                            }
                                                            ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <a> <button type="submit" name="add_city" style="float:left" class="btn btn-outline-primary btn-round">إضافة</button></a>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="card-title">جدول الدول</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> الدولة </th>
                                                    <th> كود الدولة </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < $countries_size; $i++) {
                                                ?>
                                                    <tr>

                                                        <td> <?php echo $countries[$i][1]; ?> </td>
                                                        <td> <?php echo $countries[$i][2]; ?> </td>

                                                        <td>
                                                            <form id="deletec<?php echo $countries[$i]['0']; ?>" action="basicData.php" method="POST"> <input type="hidden" name="id" value="<?php echo $countries[$i]['0']; ?>">
                                                                <button onclick="delete_data(c<?php echo $countries[$i]['0']; ?>);" name="delete_country" type="submit" style="width:50px;" class="btn btn-gradient-danger btn-rounded btn-icon">
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
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="card-title">جدول المدن</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId2" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> المدينة </th>
                                                    <th> الدولة </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < $size; $i++) {

                                                    $stmt = $conn->prepare("select country  from country where id= ?;");
                                                    $stmt->execute(array( $result[$i][2]));
                                                    $country = $stmt->fetchAll();
                                                ?>
                                                    <tr>

                                                        <td> <?php echo $result[$i][1]; ?> </td>
                                                        <td> <?php echo $country[0][0]; ?></td>
                                                        <td>
                                                            <form id="deleteci<?php echo $result[$i]['0']; ?>" action="basicData.php" method="POST"> <input type="hidden" name="C_id" value="<?php echo $result[$i]['0']; ?>">
                                                                <button onclick="delete_data(ci<?php echo $result[$i]['0']; ?>);" name="delete_city" type="submit" style="width:50px;" class="btn btn-gradient-danger btn-rounded btn-icon">
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
            <?php include '../../api/side-nav.php'; ?>
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
        function delete_data(x) {
            var v = 'delete' + x;
            if (confirm(' سيتم مسح البيانات ! '))
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
            $('#tableId2').DataTable();
        });
    </script>
</body>

</html>