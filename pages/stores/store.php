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
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">


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
                            إدارة المتاجر
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cart-outline menu-icon"></i>
              </span> </h3>
                    </div>
                    <div class="row">
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                                <form action="" onchange="validatyCoupon()">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-2">
                                                <div onclick="pro1()" class="nav-profile-image">
                                                    <input style="display:none;" type="file" id="file" required>
                                                    <img src="../../assets/images/faces/face1.jpg" alt="profile">
                                                    <h5>ارفع صورة</h5>
                                                </div>

                                            </div>
                                            <div class="col-10">

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">اسم المتجر باللغة العربية</label>
                                                    <div class="col-10">
                                                        <input placeholder="مثال : بندا" type="text" name="name" class="form-control" value="" id="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">اسم بالمتجر باللغة الانجليزية</label>
                                                    <div class="col-10">
                                                        <input placeholder="مثال : panda" type="text" name="name" class="form-control" value="" id="" required>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <a href="Control.html"> <button type="button" class="btn btn-danger btn-fw">مسح</button></a>
                                        <a href="Control.html"> <button type="submit" style="float:left" class="btn btn-outline-primary btn-round">تعديل</button></a>
                                </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                            <a href="addBranch.html"><button type="button" class="btn btn-outline-info btn-icon-text"> إضافة فرع </button></a>
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-title">جدول الفروع</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> الدولة </th>
                                                    <th> المدينة </th>
                                                    <th> مواعيد العمل </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> الصين </td>
                                                    <td> ووهانج </td>
                                                    <td>
                                                        <div class="table-responsive">
                                                            <table id="" class="ltr table">
                                                                <thead>
                                                                    <th> السبت </th>
                                                                    <th> الأحد </th>
                                                                    <th> الأثنين </th>
                                                                    <th> الثلاثاء </th>
                                                                    <th> الأربعاء </th>
                                                                    <th> الخميس </th>
                                                                    <th> الجمعة </th>
                                                                </thead>
                                                                <tbody>
                                                                    <td> 08:00 - 12:00 </td>
                                                                    <td> 08:00 - 12:00 </td>
                                                                    <td> 08:00 - 12:00 </td>
                                                                    <td> 08:00 - 12:00 </td>
                                                                    <td> 08:00 - 12:00 </td>
                                                                    <td> 08:00 - 12:00 </td>
                                                                    <td> 08:00 - 12:00 </td>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <a href="addBranch.html"><label class="badge badge-gradient-info">صفحه الفرع</label></a>
                                                            <button onclick="confirm(' سيتم مسح الفرع ! ');" type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-close"></i>
                                                              </button>
                                                        </div>
                                                    </td>
                                                </tr>
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
                                        <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                            <a href="../magazines/addMagazine.html"><button type="button" class="btn btn-outline-info btn-icon-text"> إضافة نشرة </button></a>
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-title">جدول النشرات</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId2" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> عنوان النشرة </th>
                                                    <th> عدد الصفح </th>
                                                    <th> تاريخ الانتهاء </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        محمد حسام الدين </td>
                                                    <td> 01003989594 </td>
                                                    <td> 01003989594 </td>
                                                    <td>
                                                        <div class="row">
                                                            <a href="../magazines/addMagazine.html"><label class="badge badge-gradient-info">صفحه النشرة</label></a>
                                                            <button onclick="confirm(' سيتم مسح النشرة ! ');" type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-close"></i>
                                                              </button>
                                                        </div>
                                                    </td>
                                                </tr>
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
                                        <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                            <a href="../coupons/addCoupon.html"><button type="button" class="btn btn-outline-info btn-icon-text"> إضافة كوبون </button></a>
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-title">جدول الأكواد</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId3" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> الكوبون </th>
                                                    <th> نوع الكوبون </th>
                                                    <th> الكود </th>
                                                    <th> تاريخ الانتهاء </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="../../assets//images/faces/face1.jpg" class="mr-2" alt="image"> محمد حسام الدين </td>
                                                    <td> 01003989594 </td>
                                                    <td> 01003989594 </td>
                                                    <td> 01003989594 </td>
                                                    <td>
                                                        <div class="row">
                                                            <a href="../coupons/addCoupon.html"><label class="badge badge-gradient-info">صفحه الكوبون</label></a>
                                                            <button onclick="confirm(' سيتم مسح الكود ! ');" type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-close"></i>
                                                              </button>
                                                        </div>
                                                    </td>
                                                </tr>
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
                                        <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                            <a href="../offers/addOffer.html"><button type="button" class="btn btn-outline-info btn-icon-text"> إضافة عرض </button></a>
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-title">جدول العروض</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tableId4" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> العرض </th>
                                                    <th> نوع العرض </th>
                                                    <th> تاريخ الانتهاء </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="../../assets//images/faces/face1.jpg" class="mr-2" alt="image"> محمد حسام الدين </td>
                                                    <td> 01003989594 </td>
                                                    <td> 01003989594 </td>
                                                    <td>
                                                        <div class="row">
                                                            <a href="../offers/addOffer.html"><label class="badge badge-gradient-info">صفحه العرض</label></a>
                                                            <button onclick="confirm(' سيتم مسح العرض ! ');" type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-close"></i>
                                                              </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- partial -->
                </div>


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

    <script>
        function pro1() {
            document.getElementById("file").click();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/file-upload.js"></script>

    <script src="../../assets/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableId').DataTable();
        });
        $(document).ready(function() {
            $('#tableId2').DataTable();
        });
        $(document).ready(function() {
            $('#tableId3').DataTable();
        });
        $(document).ready(function() {
            $('#tableId4').DataTable();
        });
    </script>
    <!-- End custom js for this page -->
</body>

</html>