<?php
require '../../api/db.php';
$stmt = $conn->prepare("select *  from country");
$stmt->execute();
$countries = $stmt->fetchAll();
$countries_size = $stmt->rowcount();
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orody Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
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
                            إدارة المتاجر
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-cart-outline menu-icon"></i>
                            </span> </h3>
                    </div>
                    <div class="row">
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                                <form action="../../api/store/addbranch.php" enctype="multipart/form-data" method="post">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-12">

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">اسم الفرع</label>
                                                    <div class="col-10">
                                                        <input type="text" name="name" class="form-control" value="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">الدولة</label>
                                                    <div class="col-10"><select name="country" id="country" class="form-control"  onchange="a()">
                                                            <?php
                                                            for ($i = 0; $i < $countries_size; $i++) {
                                                                echo '<option value="' . $countries[$i][0] . '">' . $countries[$i][1] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">المدينة او المدن</label>
                                                    <div class="col-10 cities">
                                                        <select multiple data-live-search="true" id="selectBox" name='students[]' id='form_widget_students' data-value='' class="selectBox form-control selectpicker">

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">العنوان</label>
                                                    <div class="col-10">
                                                        <input type="text" name="location" class="form-control" value="" required>
                                                    </div>
                                                </div>

                                                <h5 style="text-align: center; margin-left:50px;">مواعيد العمل</h5>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">السبت من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="sat_o" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">السبت إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="sat_c" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأحد من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="sun_o" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأحد إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="sun_c" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأثنين من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="mon_o" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأثنين إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="mon_c" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الثلاثاء من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="tue_o" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الثلاثاء إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="tue_c" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأربعاء من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="wen_o" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأربعاء إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="wen_c" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الخميس من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="thu_o" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الخميس إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="thu_c" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الجمعة من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="fri_o" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الجمعة إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="fri_c" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <h4> من فضلك ادخل على هذا الموقع واكتب فى الخانات السفلية المطلوب ستجده فى الموقع:
                                                    اولا سوف تعمل بحث وتاخذ بيانات الطول والعرض وتضعها فى الخانتين تحت
                                                </h4>
                                                <a href="https://www.mapcoordinates.net/en"> من فضلك ادخل الموقع من هنا</a>
                                                <br><br>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الطول (longitude)</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="number" name="fri_o" class="form-control" value="" required>
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">العرض (latitude)</label>
                                                    <div class="col-4">
                                                        <input type="number" name="fri_c" class="form-control" value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="map"></div>

                                        </div>
                                        <a> <button type="submit" class="btn btn-outline-primary btn-round">اضافة</button></a>
                                </form>
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
        function a() {
            $('#selectBox').html('');
            $.ajax({
                url: "../../api/store/citiesbycountry.php",
                method: "POST",
                data: {
                    city: document.getElementById('country').value
                },
                success: function(data) {
                   
                    console.log(data);
                    var PED = JSON.parse(data);
                    for (i = 0; i < PED.length; i++) {
                $('#selectBox').append(new Option(PED[i].text, PED[i].value));
            }
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

    <script>
        $(document).ready(function() {
            console.log("sdsd");
            var PED = [{
                "value": "566",
                "text": "Eisenstadt"
            }, {
                "value": "567",
                "text": "Innsbruck"
            }, {
                "value": "568",
                "text": "Bregenz"
            }, {
                "value": "569",
                "text": "Salzburg"
            }, {
                "value": "570",
                "text": "Linz"
            }, {
                "value": "571",
                "text": "Wiener Neustadt"
            }, {
                "value": "572",
                "text": "Sankt P\u00f6lten"
            }, {
                "value": "573",
                "text": "Graz"
            }, {
                "value": "574",
                "text": "Klagenfurt"
            }, {
                "value": "575",
                "text": "Vienna"
            }]

            
        });
    </script>

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/bootstrap-select.min.js"></script>
    <!-- End custom js for this page -->
</body>

</html>