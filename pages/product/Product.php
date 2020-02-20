<?php
require '../../api/db.php';
if(!isset($_POST['id']))
    header("location:products.php");
$stmt=$conn->prepare("select id,name,price,brand,image,details,product_branch.store  from product inner join product_branch on product.id =product_branch.product where id=?;");
$stmt->execute(array($_POST['id']));
$result=$stmt->fetchAll();
$stmt=$conn->prepare("select name  from store where id= ?;");
$stmt->execute(array($result[0]['store']));
$store=$stmt->fetchAll();
$stmt = $conn->prepare("select id,name  from  store ;");
$stmt->execute();
$stores = $stmt->fetchAll();
$stores_size = $stmt->rowcount();
$stmt = $conn->prepare("select product_branch.branch,store_branch.branch  from product_branch inner join store_branch on product_branch.branch=store_branch.id  where  product= ?;");
$stmt->execute(array($_POST['id']));
$branch = $stmt->fetchAll();
$branch_size = $stmt->rowcount();
$stmt = $conn->prepare("select id,name  from  brand ;");
$stmt->execute();
$brand = $stmt->fetchAll();
$brand_size = $stmt->rowcount();
$stmt = $conn->prepare("select name  from  brand where id =?;");
$stmt->execute(array($result[0]['brand']));
$b = $stmt->fetchAll();
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
        <?php include'../../api/nav.php';?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            إدارة المنتجات
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-xaml menu-icon"></i>
              </span> </h3>
                    </div>
                    <div class="row">
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                                <form action="../../api/product/update.php" enctype="multipart/form-data" method="post">
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
                                                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>

                                            </div>
                                            <div class="col-10">

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">اسم المنتج</label>
                                                    <div class="col-10">
                                                        <input type="text" name="name" class="form-control" value="<?php echo $result[0]['name']; ?>" id="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">التفاصيل</label>
                                                    <div class="col-10">
                                                        <textarea class="form-control"  name="details" rows="5" id="comment" required><?php echo $result[0]['details']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input"
                                                           class="col-2 col-form-label">المتجر</label>
                                                    <div class="col-10">
                                                        <select class="form-control" id="store" onchange="a()">

                                                            <option value="<?php echo $code[0]['store_id']; ?>"><?php echo $store[0][0]; ?></option>
                                                            <?php
                                                            for ($i = 0; $i < $stores_size; $i++) {
                                                                echo '<option value="' . $stores[$i][0] . '">' . $stores[$i][1] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="store1" id="store1"/>
                                                </div>
                                                <div class="form-group row" id="old">
                                                    <label for="example-search-input"
                                                           class="col-2 col-form-label">الفروع</label>
                                                    <div class="col-10">
                                                        <?php
                                                        for ($i = 0; $i < $branch_size; $i++) {
                                                            echo '<div  id="branch' . $branch[$i]['0'] . '">  
                                                      
                                                       <label>' . $branch[$i][1] . '</label>
                                                             <a onclick="delete_branch(' . $branch[$i]['0'] . ');"><label>x</label></a></div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="new" hidden>
                                                    <label for="example-search-input"
                                                           class="col-2 col-form-label">اختر الفروع</label>
                                                    <div class="col-10"><select onchange="getSelected()" name="branch[]"
                                                                                class="multi-select"
                                                                                multiple="multiple" id="selectBox"></select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">الماركة</label>
                                                    <div class="col-10"><select name="brand" class="form-control" required>
                                                        <option value="<?php echo $result[0]['brand'];?>"><?php echo $b[0][0];?></option>
                                                       <?php
                                                       for($i=0;$i<$branch_size;$i++)
                                                       {
                                                           echo '<option value="'.$brand[$i][0].'">'.$brand[$i][1].'</option>';

                                                            }
                                                       ?>
                                                      </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">سعر المنتج</label>
                                                    <div class="col-10">
                                                        <input type="number" name="price" class="form-control" value="<?php echo $result[0]['price']; ?>" id="" required>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <a onclick="delete_coupon(<?php echo $_POST['id']; ?>);">
                                            <button type="button" class="btn btn-danger btn-fw">مسح</button>
                                        </a>
                                        <a href="Control.html">
                                            <button type="submit" style="float:left"
                                                    class="btn btn-outline-primary btn-round">تعديل
                                            </button>
                                        </a></form>
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
            var v = 'branch' + x;
            document.getElementById(v).hidden = true;
            $.ajax({
                url: "../../api/product/deletebranch.php",
                method: "POST",
                data: {
                    id: <?php echo $_POST['id'];?>,
                    branch: x
                },
                success: function (data) {
                    setTimeout(function () {
                        console.log(data);
                    }, 800)
                }
            });
        }
    </script>
    <script>

        function delete_coupon(x) {

            $.ajax({
                url: "../../api/product/deleteproduct.php",
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
    <script>
        function a() {
            document.getElementById('store1').value = document.getElementById('store').value;
            document.getElementById('old').hidden = true;
            document.getElementById('new').hidden = false;
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