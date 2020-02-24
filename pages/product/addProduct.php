<?php
require '../../api/db.php';
$stmt = $conn->prepare("select id,name  from  store ;");
$stmt->execute();
$stores = $stmt->fetchAll();
$stores_size = $stmt->rowcount();
$stmt = $conn->prepare("select id,name  from  brand ;");
$stmt->execute();
$brand = $stmt->fetchAll();
$brand_size = $stmt->rowcount();
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
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">


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
                        إدارة المنتجات
                        <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-xaml menu-icon"></i>
              </span></h3>
                </div>
                <div class="row">
                    <div class="rtl col-12 grid-margin">
                        <div class="card">
                            <form action="../../api/product/add.php" enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <div onclick="pro1()" class="nav-profile-image">
                                                <input style="display:none;" type="file" id="file" name="image" required
                                                       onchange="display(this);">
                                                <img style="max-width:100%" id="img">
                                                <h5>ارفع صورة</h5>
                                            </div>

                                        </div>
                                        <div class="col-10">

                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">اسم المنتج</label>
                                                <div class="col-10">
                                                    <input type="text" name="product" class="form-control" value=""
                                                           id="" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">التفاصيل</label>
                                                <div class="col-10">
                                                    <textarea class="form-control" name="details" rows="5" id="comment"
                                                              required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                       class="col-2 col-form-label">المتجر</label>
                                                <div class="col-10">
                                                    <select class="form-control" id="store" onchange="a()">
                                                        <option value="">اختر</option>
                                                        <?php
                                                        for ($i = 0; $i < $stores_size; $i++) {
                                                            echo '<option value="' . $stores[$i][0] . '">' . $stores[$i][1] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="store1" id="store1"/>

                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                       class="col-2 col-form-label">الفروع</label>
                                                <div class="col-10"><select onchange="getSelected()" name="branch[]"
                                                                            class="multi-select"
                                                                            multiple="multiple" id="selectBox"></select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                       class="col-2 col-form-label">الماركة</label>
                                                <div class="col-10"><select name="brand" class="form-control" required>
                                                        <option value="">اختر</option>
                                                        <?php
                                                        for ($i = 0; $i < $brand_size; $i++) {
                                                            echo '<option value="' . $brand[$i][0] . '">' . $brand[$i][1] . '</option>';

                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-2 col-form-label">نوع
                                                    الفئة</label>
                                                <div class="col-10"><select id="type" name="type"
                                                                            class="form-control" onchange="cat1()"
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
                                                <div class="col-10"><select name="cat" id="cat" onchange="sub1()"
                                                                            class="form-control cat" required>
                                                        <option value="">اختر نوع الفئة</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-2 col-form-label">الفئة
                                                    التابع له</label>
                                                <div class="col-10"><select name="sub" class="form-control sub"
                                                                            required>
                                                        <option value="">اختر الفئة</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">سعر المنتج</label>
                                                <div class="col-10">
                                                    <input type="number" name="price" class="form-control" value=""
                                                           id="" required>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <a href="Control.html">
                                        <button type="submit" style="float:left"
                                                class="btn btn-outline-primary btn-round">تعديل
                                        </button>
                                    </a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- partial -->
        </div>
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
    function pro1() {
        document.getElementById("file").click();
    }
</script>
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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script src="../../assets/js/bootstrap-multiselect.min.js"></script>


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
    function cat1() {

        $('.cat').html('');
        $.ajax({
            url: "../../api/sub/category.php",
            method: "POST",
            data: {
                type: document.getElementById('type').value
            },
            success: function (data) {
                setTimeout(function () {
                    console.log(data);
                    $('.cat').html(data);

                }, 800)
            }
        });
    }
</script>
<script>
    function sub1() {

        $('.sub').html('');
        $.ajax({
            url: "../../api/sub/subcategory.php",
            method: "POST",
            data: {
                cat: document.getElementById('cat').value
            },
            success: function (data) {
                setTimeout(function () {
                    console.log(data);
                    $('.sub').html(data);

                }, 800)
            }
        });
    }
</script>
<script>
    function a() {
        document.getElementById('store1').value = document.getElementById('store').value;

        $('#store').attr('disabled', true);
        const selectMembers = $("#selectBox");
        selectMembers.empty();
        $.ajax({
            url: "../../api/store/branch.php",
            method: "POST",
            data: {
                id: document.getElementById('store').value
            },
            success: function (data) {
                console.log(data);
                var PED = JSON.parse(data);
                for (i = 0; i < PED.length; i++) {
                    selectMembers.append(new Option(PED[i].text, PED[i].value));
                }
                selectMembers.multiselect('refresh');
            }
        });
    }

    function getSelected() {
        console.log($('#selectBox').val());

    }
</script>

<!-- End custom js for this page -->
</body>

</html>