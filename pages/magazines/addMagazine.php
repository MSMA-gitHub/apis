<?php
require '../../api/db.php';
if (isset($_POST['id']))
    $stmt = $conn->prepare("select id,name  from  store where id = " . $_POST['id'] . ";");
else
    $stmt = $conn->prepare("select id,name  from  store ;");
$stmt->execute();
$stores = $stmt->fetchAll();
$stores_size = $stmt->rowcount();
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
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">
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
                            إدارة النشرات
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-newspaper menu-icon"></i>
                            </span></h3>
                    </div>
                    <div class="row">
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                                <form action="../../api/magazine/add.php" enctype="multipart/form-data" method="post">
                                    <div class="card-body">
                                        <div class="form-group row">

                                            <div class="col-12">


                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">صورة غلاف
                                                        النشرة</label>
                                                    <div class="col-10">

                                                        <input required type="file" class="form-control" id="images0" name="image" onchange="preview_images0();" />
                                                        <div class="row" id="image_preview0">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                    <label for="example-search-input2" class="col-2">صور النشرة</label>
                                                    <div class="col-10">

                                                        <input required type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple />
                                                        <div class="row" id="image_preview">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">عنوان النشرة</label>
                                                    <div class="col-10">
                                                        <input type="text" name="title" class="form-control" value="" required>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group row">
                                                <label for="example-search-input" class="col-2 col-form-label">نوع
                                                    النشرة</label>
                                                <div class="col-10">
                                                    <select class="form-control" name="type[]" required>
                                                        <option value="0">سوبر ماركت</option>
                                                        <option value="1">الكترونيات</option>
                                                        <option value="2">صحة و جمال</option>
                                                        <option value="3">أخري</option>

                                                    </select>
                                                </div>
                                            </div> -->
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">نوع النشره</label>
                                                    <div class="col-10"><select multiple onchange="getSelected1()" name="type[]" class="selectpicker" id="selectBox1">
                                                            <option value="0">سوبر ماركت</option>
                                                            <option value="1">الكترونيات</option>
                                                            <option value="2">صحة و جمال</option>
                                                            <option value="3">أخري</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">المتجر</label>
                                                    <div class="col-10">
                                                        <select class="form-control" id="store" onchange="a()">
                                                            <?php
                                                            if (isset($_POST['id']))
                                                                echo '<option selected value="' . $stores[0][0] . '">' . $stores[0][1] . '</option>';
                                                            else {
                                                                echo '<option value="">اختر</option>';
                                                                for ($i = 0; $i < $stores_size; $i++) {
                                                                    echo '<option value="' . $stores[$i][0] . '">' . $stores[$i][1] . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>

                                                    </div>
                                                    <input type="hidden" name="store1" id="store1" />
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">الفروع</label>
                                                    <div class="col-10"><select onchange="getSelected()" name="branch[]" class="multi-select" multiple="multiple" id="selectBox"></select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">تاريخ الانتهاء</label>
                                                    <div class="col-10">
                                                        <input type="date" name="date" class="form-control" value="" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <a href="Control.html">
                                            <button type="submit" style="float:left" class="btn btn-outline-primary btn-round">اضافة
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
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
        function a() {
            <?php
            if (isset($_POST['id'])) {
                echo 'var id=' . $_POST['id'] . ' ;';
                echo " document.getElementById('store1').value =" . $_POST['id'] . ' ;';
            } else {
                echo "
        document.getElementById('store1').value = document.getElementById('store').value;
     var id= document.getElementById('store').value;";
            }
            ?>
            $('#store').attr('disabled', true);
            const selectMembers = $("#selectBox");
            selectMembers.empty();
            $.ajax({
                url: "../../api/store/branch.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
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


        $('#selectBox1').multiselect({
            onChange: function() {
                var selected = this.$select.val();
                console.log(selected);
            }
        });
    </script>
    <?php
    if (isset($_POST['id']))
        echo '<script> a();</script>';
    ?>
    <!-- End custom js for this page -->
</body>

</html>