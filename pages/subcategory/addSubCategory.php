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
    <?php include "../../api/nav.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        إدارة الفئات
                        <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-xaml menu-icon"></i>
              </span></h3>
                </div>
                <div class="row">
                    <div class="rtl col-12 grid-margin">
                        <div class="card">
                            <form action="../../api/sub/add.php" enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-2">
                                                <div onclick="pro1()" class="nav-profile-image">
                                                    <input style="display:none;" name="image" type="file" id="file"
                                                           onchange="display(this);">
                                                    <img src="../../api/assets/unloaded.png" style="max-width:100%" id="img" >
                                                    <h5>ارفع صورة</h5>
                                                </div>

                                            </div>
                                            <div class="col-10">

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأسم</label>
                                                    <div class="col-10">
                                                        <input type="text" name="name" class="form-control" value=""
                                                               id="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">نوع
                                                        الفئة</label>
                                                    <div class="col-10"><select id="type" name="type"
                                                                                class="form-control" onchange="cat()"
                                                                                required>
                                                            <option value="">اختر</option>
                                                            <option value="0">الفئات</option>
                                                            <option value="1">قائمة التسوق</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">القسم
                                                        التابع له</label>
                                                    <div class="col-10"><select اسم name="sub" class="form-control cat"
                                                                                required>
                                                            <option value="">اختر نوع الفئة</option>

                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a>
                                            <button type="submit" style="float:left"
                                                    class="btn btn-outline-primary btn-round">اضافة
                                            </button>
                                        </a>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- partial -->
        </div>
    </div>
    <!-- partial:partials/_sidebar.html -->

    <?php include "../../api/side-nav.php"; ?>
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
<script>
    function display(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img')
                    .attr('src', e.target.result)

            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    function cat() {

        $('.cat').html('');
        $.ajax({
            url: "../../api/sub/category.php",
            method: "POST",
            data: {
                type: document.getElementById('type').value
            },
            success: function (data) {
                setTimeout(function () {

                    $('.cat').html(data);

                }, 800)
            }
        });
    }
</script>
<!-- End custom js for this page -->
</body>

</html>