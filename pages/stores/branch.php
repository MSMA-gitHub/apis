<?php
require '../../api/db.php';
$stmt = $conn->prepare("select *  from store_branch where id= ?;");
$stmt->execute(array($_POST['id']));
$result = $stmt->fetchAll();
$stmt=$conn->prepare("select *  from country where  id ='".$result[0]["countryid"]."';");
$stmt->execute();
$country=$stmt->fetchAll();
$stmt=$conn->prepare("select *  from country");
$stmt->execute();
$countries=$stmt->fetchAll();
$countries_size=$stmt->rowcount();
$stmt=$conn->prepare("select *  from city where  id ='".$result[0]["cityid"]."';");
$stmt->execute();
$city=$stmt->fetchAll();
$stmt=$conn->prepare("select *  from city where  countrycode ='".$result[0]["countryid"]."';");
$stmt->execute();
$cities=$stmt->fetchAll();
$cities_size=$stmt->rowcount();
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orody Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
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
                            </span></h3>
                </div>
                <div class="row">
                    <div class="rtl col-12 grid-margin">
                        <div class="card">
                            <form action="../../api/store/update.php" enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">اسم الفرع</label>
                                                <div class="col-10">
                                                    <input type="text" name="name" class="form-control" value="<?php echo $result[0]['branch'] ?>"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-2 col-form-label">الدولة</label>
                                                <div class="col-10"><select name="country" id="country" class="form-control" onchange="a()">
                                                        <option value="<?php echo $country[0][0] ?>"><?php echo $country[0][1] ?></option>
                                                        <?php
                                                        for($i=0;$i<$countries_size;$i++)
                                                        {
                                                            echo '<option value="'.$countries[$i][0].'">'.$countries[$i][1].'</option>';
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-2 col-form-label">المدينة</label>
                                                <div class="col-10"><select name="city" class="form-control cities">
                                                        <option value="<?php echo $city[0][0] ?>"><?php echo $city[0][1] ?></option>
                                                        <?php
                                                        for($i=0;$i<$cities_size;$i++)
                                                        {
                                                            echo '<option value="'.$cities[$i][0].'">'.$cities[$i][1].'</option>';
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                       class="col-2 col-form-label">العنوان</label>
                                                <div class="col-10">
                                                    <input type="text" value="<?php echo $result[0]['location'] ?>" name="location" class="form-control" .
                                                           required>
                                                </div>
                                            </div>

                                            <h5 style="text-align: center; margin-left:50px;">مواعيد العمل</h5>
                                            <br>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">السبت من :</label>
                                                <div class="col-4">
                                                    <div class="col-10">
                                                        <input type="time" value="<?php echo $result[0]['sat-open'] ?>" name="sat_o"   class="form-control" .>
                                                    </div>
                                                </div>
                                                <label for="example-search-input2" class="col-2">السبت إلي :</label>
                                                <div class="col-4">
                                                    <input type="time" value="<?php echo $result[0]['sat-close'] ?>" name="sat_c" class="form-control" .>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">الأحد من :</label>
                                                <div class="col-4">
                                                    <div class="col-10">
                                                        <input type="time" value="<?php echo $result[0]['sun-open'] ?>" name="sun_o" class="form-control" .>
                                                    </div>
                                                </div>
                                                <label for="example-search-input2" class="col-2">الأحد إلي :</label>
                                                <div class="col-4">
                                                    <input type="time" value="<?php echo $result[0]['sun-close'] ?>" name="sun_c" class="form-control" .>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">الأثنين من :</label>
                                                <div class="col-4">
                                                    <div class="col-10">
                                                        <input type="time" value="<?php echo $result[0]['mon-open'] ?>" name="mon_o" class="form-control" .>
                                                    </div>
                                                </div>
                                                <label for="example-search-input2" class="col-2">الأثنين إلي :</label>
                                                <div class="col-4">
                                                    <input type="time" value="<?php echo $result[0]['mon-close'] ?>" name="mon_c" class="form-control" .>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">الثلاثاء من :</label>
                                                <div class="col-4">
                                                    <div class="col-10">
                                                        <input type="time" value="<?php echo $result[0]['tues-open'] ?>" name="tue_o" class="form-control" .>
                                                    </div>
                                                </div>
                                                <label for="example-search-input2" class="col-2">الثلاثاء إلي :</label>
                                                <div class="col-4">
                                                    <input type="time" value="<?php echo $result[0]['tues-close'] ?>" name="tue_c" class="form-control" .>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">الأربعاء من :</label>
                                                <div class="col-4">
                                                    <div class="col-10">
                                                        <input type="time" value="<?php echo $result[0]['wends-open'] ?>" name="wen_o" class="form-control" .>
                                                    </div>
                                                </div>
                                                <label for="example-search-input2" class="col-2">الأربعاء إلي :</label>
                                                <div class="col-4">
                                                    <input type="time" value="<?php echo $result[0]['wen-close'] ?>" name="wen_c" class="form-control" .>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">الخميس من :</label>
                                                <div class="col-4">
                                                    <div class="col-10">
                                                        <input type="time" value="<?php echo $result[0]['thurs-open'] ?>" name="thu_o" class="form-control" .>
                                                    </div>
                                                </div>
                                                <label for="example-search-input2" class="col-2">الخميس إلي :</label>
                                                <div class="col-4">
                                                    <input type="time" value="<?php echo $result[0]['thur-close'] ?>" name="thu_c" class="form-control" .>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">الجمعة من :</label>
                                                <div class="col-4">
                                                    <div class="col-10">
                                                        <input type="time" value="<?php echo $result[0]['fri-open'] ?>" name="fri_o" class="form-control" .>
                                                    </div>
                                                </div>
                                                <label for="example-search-input2" class="col-2">الجمعة إلي :</label>
                                                <div class="col-4">
                                                    <input type="time" value="<?php echo $result[0]['fri-close'] ?>" name="fri_c" class="form-control" .>
                                                </div>
                                            </div>
                                            <h4> من فضلك ادخل على هذا الموقع واكتب فى الخانات السفلية المطلوب ستجده فى
                                                الموقع:
                                                اولا سوف تعمل بحث وتاخذ بيانات الطول والعرض وتضعها فى الخانتين تحت
                                            </h4>
                                            <a href="https://www.mapcoordinates.net/en"> من فضلك ادخل الموقع من هنا</a>
                                            <br><br>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">الطول
                                                    (longitude)</label>
                                                <div class="col-4">
                                                    <div class="col-10">
                                                        <input type="number" value="<?php echo $result[0]['lat'] ?>" name="lan" class="form-control" .
                                                               required>
                                                    </div>
                                                </div>
                                                <label for="example-search-input2" class="col-2">العرض
                                                    (latitude)</label>
                                                <div class="col-4">
                                                    <input type="number" value="<?php echo $result[0]['lan'] ?>" name="lat" class="form-control" .
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="map"></div>

                                    </div>
                                    <a onclick="delete_coupon(<?php echo $_POST['id']; ?>);">
                                        <button type="button" class="btn btn-danger btn-fw">مسح</button>
                                    </a>
                                    <a href="Control.html">
                                        <button type="submit" style="float:left"
                                                class="btn btn-outline-primary btn-round">تعديل
                                        </button>
                                    </a></form>
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


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

<script>
    function a()
    {
        $('.cities').html('');
        $.ajax({
            url: "../../api/citiesbycountry.php",
            method: "POST",
            data: {
                city : document.getElementById('country').value
            },
            success: function (data) {
                setTimeout(function(){
                    $('.cities').html(data);
                },800)
            }
        });
    }
</script>
</script>

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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

<script src="../../assets/js/bootstrap-select.min.js"></script>
<script>

    function delete_coupon(x) {

        $.ajax({
            url: "../../api/store/deletebranch.php",
            method: "POST",
            data: {
                id: x
            },
            success: function (data) {
                setTimeout(function () {
                    window.location.href = "products.php";
                }, 800)
            }
        });
    }
</script>


<!-- End custom js for this page -->
</body>

</html>