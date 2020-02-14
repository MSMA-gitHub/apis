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
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">
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
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                                <form action="">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-12">
                                            <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">صورة غلاف النشرة</label>
                                                    <div class="col-10">

                                                        <input required type="file" class="form-control" id="images0" name="images[]" onchange="preview_images0();" />
                                                        <div class="row" id="image_preview0">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">صور النشرة</label>
                                                    <div class="col-10">

                                                        <input required type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
                                                        <div class="row" id="image_preview">
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">عنوان النشرة</label>
                                                    <div class="col-10">
                                                        <input type="text" name="name" class="form-control" value="" id="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">المتجر</label>
                                                    <div class="col-10">
                                                        <select class="form-control" id="cars" required>
                                                        <option value="">اختر</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">الفروع</label>
                                                    <div class="col-10"><select class="selectpicker form-control" multiple name="sms">
                                                        
                                                        <option>ذكر</option>
                                                        <option>خنثي</option>
                                                      </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">تاريخ الانتهاء</label>
                                                    <div class="col-10">
                                                        <input type="date" class="form-control" value="" id="" required>
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
        function preview_images0() {
            var total_file = document.getElementById("images0").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview0').append("<div onclick='' class=''><img  class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
            }
        }
        function preview_images() {
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div onclick='' class=''><img  class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
            }
        }

        function remove_image() {

        }
    </script>

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
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- End custom js for this page -->
</body>

</html>