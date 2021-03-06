<?php
require '../../api/db.php';
$s = $_POST['id'];
$stmt = $conn->prepare("select * from store  where id=?;");
$stmt->execute(array($s));
$result = $stmt->fetchAll();
$stmt = $conn->prepare("select *  from store_branch where store= ?;");
$stmt->execute(array($s));
$branch = $stmt->fetchAll();
$b_size = $stmt->rowcount();
$stmt = $conn->prepare("select *  from code where id in (select code from store_code where store_id= ?) and( type = 0 or type = 1);");
$stmt->execute(array($s));
$code = $stmt->fetchAll();
$c_size = $stmt->rowcount();
$stmt = $conn->prepare("select *  from code where id in (select code from store_code where store_id= ?) and( type = 2 or type = 3 or type = 4);");
$stmt->execute(array($s));
$offers = $stmt->fetchAll();
$o_size = $stmt->rowcount();
$stmt = $conn->prepare("select magazine.id,title,end_date,count(photo)  from magazine inner join magazine_photo on magazine.id= magazine_photo.id  where magazine.id in (select id from magazine_branch where store= ?) GROUP by magazine_photo.id order by end_date desc
;");
$stmt->execute(array($s));
$magazine = $stmt->fetchAll();
$m_size = $stmt->rowcount();
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
                        إدارة المتاجر
                        <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cart-outline menu-icon"></i>
              </span></h3>
                </div>
                <div class="row">
                    <div class="rtl col-12 grid-margin">
                        <div class="card">
                            <form action="../../api/store/editstore.php" enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <div onclick="pro1()" class="nav-profile-image">
                                                <input style="display:none;" type="file" id="file" name="image"
                                                       onchange="display(this);">
                                                <img src="../../api/<?php echo $result[0]['image']; ?>"
                                                     style="max-width:100%" id="img">
                                                <h5>ارفع صورة</h5>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $result[0][0]; ?>"/>
                                        </div>
                                        <div class="col-10">

                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">اسم المتجر باللغة
                                                    العربية</label>
                                                <div class="col-10">
                                                    <input placeholder="مثال : بندا" type="text" name="name"
                                                           class="form-control" value="<?php echo $result[0][1]; ?>"
                                                           id="" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input2" class="col-2">اسم بالمتجر باللغة
                                                    الانجليزية</label>
                                                <div class="col-10">
                                                    <input placeholder="مثال : panda" type="text" name="name"
                                                           class="form-control" value="<?php echo $result[0][3]; ?>"
                                                           id="" required>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <a onclick="delete_store(<?php echo $_POST['id']; ?>);">
                                        <button type="button" class="btn btn-danger btn-fw">مسح</button>
                                    </a>

                                    <a>
                                        <button type="submit" style="float:left"
                                                class="btn btn-outline-primary btn-round">تعديل
                                        </button>
                                    </a>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                    <form id="store<?php echo $_POST['id']; ?>" action="addBranch.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                                        <a onclick="document.getElementById('store<?php echo $_POST['id']; ?>').submit();">
                                            <button type="submit" class="btn btn-outline-info btn-icon-text"> إضافة
                                                فرع
                                            </button>
                                        </a></form>


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
                                        <th> الدولة</th>
                                        <th> المدينة</th>
                                        <th> السبت</th>
                                        <th> الأحد</th>
                                        <th> الأثنين</th>
                                        <th> الثلاثاء</th>
                                        <th> الأربعاء</th>
                                        <th> الخميس</th>
                                        <th> الجمعة</th>
                                        <th> خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < $b_size; $i++) {
                                        $stmt = $conn->prepare("select country  from country where id= ?;");
                                        $stmt->execute(array($branch[$i][2]));
                                        $country = $stmt->fetchAll();
                                        $stmt = $conn->prepare("select city  from city where id =?;");
                                        $stmt->execute(array($branch[$i][3]));
                                        $city = $stmt->fetchAll();
                                        $o = 6;
                                        $c = 13;
                                        ?>
                                        <tr>
                                            <td> <?php echo $country[0][0]; ?> </td>
                                            <td> <?php echo $city[0][0]; ?> </td>

                                            <td> <?php

                                                if ('00:00:00' == ($branch[$i][$o]) || '00:00:00' == ($branch[$i][$c])) {
                                                    echo 'closed';
                                                } else {
                                                    echo date('H:i', strtotime($branch[$i][$o])) . ' - ' . date('H:i', strtotime($branch[$i][$c]));
                                                }

                                                $o++;
                                                $c++;
                                                ?></td>
                                            <td> <?php
                                                if ('00:00:00' == ($branch[$i][$o]) || '00:00:00' == ($branch[$i][$c])) {
                                                    echo 'closed';
                                                } else {
                                                    echo date('H:i', strtotime($branch[$i][$o])) . ' - ' . date('H:i', strtotime($branch[$i][$c]));
                                                }

                                                $o++;
                                                $c++;
                                                ?></td>
                                            <td> <?php
                                                if ('00:00:00' == ($branch[$i][$o]) || '00:00:00' == ($branch[$i][$c])) {
                                                    echo 'closed';
                                                } else {
                                                    echo date('H:i', strtotime($branch[$i][$o])) . ' - ' . date('H:i', strtotime($branch[$i][$c]));
                                                }

                                                $o++;
                                                $c++;
                                                ?></td>
                                            <td>  <?php
                                                if ('00:00:00' == ($branch[$i][$o]) || '00:00:00' == ($branch[$i][$c])) {
                                                    echo 'closed';
                                                } else {
                                                    echo date('H:i', strtotime($branch[$i][$o])) . ' - ' . date('H:i', strtotime($branch[$i][$c]));
                                                }

                                                $o++;
                                                $c++;
                                                ?></td>
                                            <td> <?php
                                                if ('00:00:00' == ($branch[$i][$o]) || '00:00:00' == ($branch[$i][$c])) {
                                                    echo 'closed';
                                                } else {
                                                    echo date('H:i', strtotime($branch[$i][$o])) . ' - ' . date('H:i', strtotime($branch[$i][$c]));
                                                }

                                                $o++;
                                                $c++;
                                                ?> </td>
                                            <td>  <?php
                                                if ('00:00:00' == ($branch[$i][$o]) || '00:00:00' == ($branch[$i][$c])) {
                                                    echo 'closed';
                                                } else {
                                                    echo date('H:i', strtotime($branch[$i][$o])) . ' - ' . date('H:i', strtotime($branch[$i][$c]));
                                                }

                                                $o++;
                                                $c++;
                                                ?> </td>
                                            <td>  <?php
                                                if ('00:00:00' == ($branch[$i][$o]) || '00:00:00' == ($branch[$i][$c])) {
                                                    echo 'closed';
                                                } else {
                                                    echo date('H:i', strtotime($branch[$i][$o])) . ' - ' . date('H:i', strtotime($branch[$i][$c]));
                                                }

                                                ?> </td>
                                            <td>
                                                <div class="row">
                                                    <form id="branch<?php echo $branch[$i][0]; ?>" action="branch.php"
                                                          method="POST"><input type="hidden" name="id"
                                                                               value="<?php echo $branch[$i][0]; ?>">
                                                        <input type="hidden" name="id"
                                                               value="<?php echo $branch[$i][0]; ?>">
                                                        <a onclick="document.getElementById('branch<?php echo $branch[$i][0]; ?>').submit();"><label
                                                                    class="badge badge-gradient-info">صفحه الفرع</label></a>
                                                    </form>
                                                    <a style="width:30px"></a>
                                                    <form id="deleteB<?php echo $branch[$i][0]; ?>"
                                                          action="../../api/store/delete_branch.php" method="POST">
                                                        <input type="hidden" name="id"
                                                               value="<?php echo $branch[$i][0]; ?>">
                                                        <button onclick="delete_branch(<?php echo $branch[$i][0]; ?>);"
                                                                type="button" style="width:50px;"
                                                                class="btn btn-gradient-danger btn-rounded btn-icon">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
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
                                <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                    <form id="mag<?php echo $_POST['id']; ?>" action="../magazines/addMagazine.php"
                                          method="POST"><input type="hidden" name="id"
                                                               value="<?php echo $_POST['id']; ?>">
                                        <a onclick="document.getElementById('mag<?php echo $_POST['id']; ?>').submit();">
                                            <button type="submit" class="btn btn-outline-info btn-icon-text"> إضافة
                                                نشرة
                                            </button>
                                        </a></form>
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
                                        <th> عنوان النشرة</th>
                                        <th> عدد الصفح</th>
                                        <th> تاريخ الانتهاء</th>
                                        <th> خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < $m_size; $i++) {

                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $magazine[$i][1]; ?></td>
                                            <td> <?php echo $magazine[$i][3] + 1; ?></td>
                                            <td> <?php echo $magazine[$i][2]; ?> </td>
                                            <td>
                                                <div class="row">
                                                    <form id="magazine<?php echo $magazine[$i][0]; ?>"
                                                          action="../magazines/magazine.php" method="POST"><input
                                                                type="hidden" name="id"
                                                                value="<?php echo $magazine[$i][0]; ?>">
                                                        <a onclick="document.getElementById('magazine<?php echo $magazine[$i][0]; ?>').submit();"><label
                                                                    class="badge badge-gradient-info">صفحه
                                                                النشره</label></a></form>
                                                    <a style="width:30px"></a>
                                                    <form id="deleteM<?php echo $magazine[$i][0]; ?>"
                                                          action="../../api/magazine/delete_magazine.php" method="POST">
                                                        <input type="hidden" name="id"
                                                               value="<?php echo $magazine[$i][0]; ?>">
                                                        <button onclick="delete_magazine(<?php echo $magazine[$i][0]; ?>);"
                                                                type="button" style="width:50px;"
                                                                class="btn btn-gradient-danger btn-rounded btn-icon">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    } ?>
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
                                    <form id="cou<?php echo $_POST['id']; ?>" action="../coupons/addCoupon.php"
                                          method="POST"><input type="hidden" name="id"
                                                               value="<?php echo $_POST['id']; ?>">
                                        <a onclick="document.getElementById('cou<?php echo $_POST['id']; ?>').submit();">
                                            <button type="submit" class="btn btn-outline-info btn-icon-text"> إضافة
                                                كوبون
                                            </button>
                                        </a></form>
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
                                        <th> الكوبون</th>
                                        <th>صورة الكوبون</th>
                                        <th> نوع الكوبون</th>
                                        <th> الكود</th>
                                        <th> تاريخ الانتهاء</th>
                                        <th> خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < $c_size; $i++) { ?>
                                        <tr>
                                            <td><?php echo $code[$i]['title']; ?>
                                            </td>
                                            <td>
                                                <img src="../../api/<?php echo $code[$i]['photo']; ?>"
                                                     class="mb-2 mh-50 rounded" alt="image"></td>
                                            <td> <?php if ($code[$i]['type'] == 0)
                                                    echo 'خصم مبلغ';
                                                elseif ($code[$i]['type'] == 1)
                                                    echo 'خصم نسبة ';
                                                ?> </td>
                                            <td> <?php echo $code[$i]['code']; ?> </td>
                                            <td> <?php echo $code[$i]['end_date']; ?> </td>
                                            <td>
                                                <div class="row">
                                                    <form id="code<?php echo $code[$i][0]; ?>"
                                                          action="../coupons/coupon.php" method="POST"><input
                                                                type="hidden" name="id"
                                                                value="<?php echo $code[$i][0]; ?>">
                                                        <a onclick="document.getElementById('code<?php echo $code[$i][0]; ?>').submit();"><label
                                                                    class="badge badge-gradient-info">صفحه الكود</label></a>
                                                    </form>
                                                    <a style="width:30px"></a>
                                                    <form id="deleteC<?php echo $code[$i]['id']; ?>"
                                                          action="../../api/code/deletecode.php?i=0" method="POST">
                                                        <input type="hidden" name="id"
                                                               value="<?php echo $code[$i]['id']; ?>">
                                                        <button onclick="delete_code(<?php echo $code[$i]['id']; ?>);"
                                                                type="button" style="width:50px;"
                                                                class="btn btn-gradient-danger btn-rounded btn-icon">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
                                <div style="text-align: -webkit-left;margin-bottom: 10;" class="col-sm-5">
                                    <form id="off<?php echo $_POST['id']; ?>" action="../offers/addOffer.php"
                                          method="POST"><input type="hidden" name="id"
                                                               value="<?php echo $_POST['id']; ?>">
                                        <a onclick="document.getElementById('off<?php echo $_POST['id']; ?>').submit();">
                                            <button type="submit" class="btn btn-outline-info btn-icon-text">إضافة عرض
                                            </button>
                                        </a></form>
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
                                        <th> العرض</th>
                                        <th>صورة العرض</th>
                                        <th> نوع العرض</th>
                                        <th> تاريخ الانتهاء</th>
                                        <th> خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < $o_size; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $offers[$i]['title']; ?></td>
                                            <td>
                                                <img src="../../api/<?php echo $offers[$i]['photo']; ?>"
                                                     class="mb-2 mh-50 rounded" alt="image"></td>
                                            <td> <?php if ($offers[$i]['type'] == 2)
                                                    echo 'هدية مجانية';
                                                elseif ($offers[$i]['type'] == 3)
                                                    echo 'شحن مجاني ';
                                                else
                                                    echo 'أخري'; ?>
                                            </td>
                                            <td><?php echo $offers[$i]['end_date']; ?></td>
                                            <td>
                                                <div class="row">
                                                    <form id="code<?php echo $offers[$i]['id']; ?>"
                                                          action="../offers/offer.php" method="POST"><input
                                                                type="hidden" name="id"
                                                                value="<?php echo $offers[$i]['id']; ?>">
                                                        <a onclick="document.getElementById('code<?php echo $offers[$i]['id']; ?>').submit();"><label
                                                                    class="badge badge-gradient-info">صفحه العرض</label></a>
                                                    </form>
                                                    <a style="width:30px"></a>
                                                    <form id="deleteC<?php echo $offers[$i]['id']; ?>"
                                                          action="../../api/code/deletecode.php?i=1" method="POST">
                                                        <input type="hidden" name="id"
                                                               value="<?php echo $offers[$i]['id']; ?>">
                                                        <button onclick="delete_code(<?php echo $offers[$i]['id']; ?>);"
                                                                type="button" style="width:50px;"
                                                                class="btn btn-gradient-danger btn-rounded btn-icon">
                                                            <i class="mdi mdi-close"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    } ?>
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
    function delete_branch(x) {
        var v = 'deleteB' + x;
        if (confirm(' سيتم مسح الفرع و كل المنتجات التابعه له  ! '))
            document.getElementById(v).submit();
    }
</script>
<script>
    function delete_code(x) {
        var v = 'deleteC' + x;
        if (confirm(' سيتم مسح البيانات ! '))
            document.getElementById(v).submit();
    }
</script>
<script>
    function delete_magazine(x) {
        var v = 'deleteM' + x;
        if (confirm(' سيتم مسح النشره بكل بيانتها '))
            document.getElementById(v).submit();
    }
</script>
<script>
    function delete_store(x) {
        if (confirm(' سيتم مسح المتجر و كل المنتجات التابعه له  ! ')) {
            $.ajax({
                url: "../../api/store/delete_store.php",
                method: "POST",
                data: {
                    id: x
                },
                success: function (data) {
                    setTimeout(function () {
                        window.location.href = "stores.php";
                    }, 800)
                }
            });
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('#tableId').DataTable();
    });
    $(document).ready(function () {
        $('#tableId2').DataTable();
    });
    $(document).ready(function () {
        $('#tableId3').DataTable();
    });
    $(document).ready(function () {
        $('#tableId4').DataTable();
    });
</script>
<!-- End custom js for this page -->
</body>

</html>