
<?php 
require '../../api/db.php';

$sql="select * ,store,branch,add_id  from addvertisement inner join addvertisement_branch on addvertisement.id =addvertisement_branch.id  where add_id= ?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($_POST['id']));
$result=$stmt->fetchAll();
$sql="select name  from store where id= ? ;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($result[0]['store']));
$s=$stmt->fetchAll();
$sql="select name  from product where id= ? ;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($result[0]['product_id']));
$p=$stmt->fetchAll();
$sql="select branch  from store_branch where id= ? ;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($result[0]['branch']));
$b=$stmt->fetchAll();
$sql="select id,name  from store;";
$stmt=$conn->prepare($sql);
$stmt->execute();
$size=$stmt->rowCount();
$result1=$stmt->fetchAll();
$sql="select id,branch  from store_branch where store= ? ;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($result[0]['store']));
$branch=$stmt->fetchAll();
$branch_size=$stmt->rowCount();
$stmt=$conn->prepare("select id,name  from product where id in (select product from product_branch where  branch ='".$result[0]['branch']."');");
$stmt->execute();
$product=$stmt->fetchAll();
$product_size=$stmt->rowcount();
?>
<html lang="en">

<head>
    <!--  meta tags -->
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
        <?php include'../../api/nav.php';?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            إدارة الاعلانات
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-xaml menu-icon"></i>
              </span> </h3>
                    </div>
                    <div class="row">
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                            <form action="../../api/adds/editadd.php" enctype="multipart/form-data" method="post">
                               <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-2">
                                                <div onclick="pro1()" class="nav-profile-image">
                                                    <input style="display:none;" type="file" id="file" name="image"  onchange="display(this);">
                                                    <img src="../../api/<?php echo $result[0]['photo'];?>" style="max-width:100%" id="img" >
                                                    <h5>ارفع صورة</h5>
                                                </div>
                                                <input type="hidden" name="add" value="<?php echo $result[0][0];?>"/>
                                                <input type="hidden" name="add_branch" value="<?php echo $result[0]['add_id'];?>"/>
                                            </div>
                                            <div class="col-10">

                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">المتجر</label>
                                                    <div class="col-10">
                                                        <select class="form-control" id="store1" name="store" onchange="branch2()" >
                                                        <option value="<?php echo $result[0]['store'];?>"><?php echo $s[0][0];?></option>
                                                        <?php
                                                        for($i=0;$i<$size;$i++)
                                                        {
                                                        echo'<option value="'.$result1[$i][0].'">'.$result1[$i][1].'</option>';
                                                        }?>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">الفرع</label>
                                                    <div class="col-10">
                                                        <select class="form-control branch" onchange="product1()" id="branch" name="branch" >
                                                        <option value="<?php echo $result[0]['branch'];?>"><?php echo $b[0][0];?></option>
                                                        <?php
                                                        for($i=0;$i<$branch_size;$i++)
                                                        {
                                                        echo'<option value="'.$branch[$i][0].'">'.$branch[$i][1].'</option>';
                                                        }?>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">المنتج</label>
                                                    <div class="col-10">
                                                        <select class="form-control product_data" name="product" >
                                                        <option value="<?php echo $result[0]['product_id'];?>"><?php echo $p[0][0];?></option>
                                                        <?php
                                                        for($i=0;$i<$product_size;$i++)
                                                        {
                                                        echo'<option value="'.$product[$i][0].'">'.$product[$i][1].'</option>';
                                                        }?>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">تاريخ البداية</label>
                                                    <div class="col-10">
                                                        <input type="date" class="form-control" name="start" value="<?php echo $result[0][2];?>"  >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">تاريخ إنتهاء</label>
                                                    <div class="col-10">
                                                        <input type="date" class="form-control"  name="end" value="<?php echo $result[0][3];?>"  >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                       <a onclick="delete_add(<?php echo$_POST['id']; ?>);"> <button type="button" class="btn btn-danger btn-fw">مسح</button></a>

                                        <a > <button type="submit" style="float:left" class="btn btn-outline-primary btn-round">تعديل</button></a>
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
        function pro1() {
            document.getElementById("file").click();
        }
    </script>

       
            

    <script src="../../assets/js/jquery-3.3.1.js"></script>
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
        function delete_add(x)
        {
            if(confirm(' سيتم مسح الاعلان ! '))
            {
            $.ajax({
              url: "../../api/adds/deletead.php",
              method: "POST",
              data: {
                  id : x
              },
              success: function (data) {
                setTimeout(function(){
                  window.location.href="ads.php";
              },800)
              }
            });
        }
    }
        </script>
         <script>
         function branch2()
            {
                
                $('.branch').html('');
               
                $.ajax({
                    
              url: "../../api/adds/branchbystore.php",
              method: "POST",
              data: {
                  store : document.getElementById('store1').value
              },
              success: function (data) {
                setTimeout(function(){
                  $('.branch').html(data);
                 
              },800)
              }
            });
        }
            </script>
              <script>
         function product1()
            {
                console.log(document.getElementById('branch').value);
                $('.product_data').html('');
                $.ajax({
              url: "../../api/adds/productbybranch.php",
              method: "POST",
              data: {
                  branch : document.getElementById('branch').value
              },
              success: function (data) {
                setTimeout(function(){
                    console.log(data);
                  $('.product_data').html(data);
                 
              },800)
              }
            });
        }
            </script>
            
    <!-- End custom js for this page -->
</body>

</html>