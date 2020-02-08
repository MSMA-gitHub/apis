
 <?php
 require '../../api/db.php';
 if(!isset($_POST['id']))
  header("location: users.php");
  else
  $u =$_POST['id'];
 $sql="select *  from users where id = $u;";
 $stmt=$conn->prepare($sql);
 $stmt->execute();
 $size=$stmt->rowCount();
 $result=$stmt->fetchAll();
  
     $stmt=$conn->prepare("select *  from country where  id ='".$result[0]["country"]."';");
     $stmt->execute();
     $country=$stmt->fetchAll();
     $stmt=$conn->prepare("select *  from country");
     $stmt->execute();
     $countries=$stmt->fetchAll();
     $countries_size=$stmt->rowcount();
     $stmt=$conn->prepare("select *  from city where  id ='".$result[0]["city"]."';");
     $stmt->execute();
     $city=$stmt->fetchAll();
     $stmt=$conn->prepare("select *  from city where  countrycode ='".$result[0]["country"]."';");
     $stmt->execute();
     $cities=$stmt->fetchAll();
     $cities_size=$stmt->rowcount();
 
     $stmt=$conn->prepare("select *  from store where  id in (select store_Id from favorite_s where id ='".$u."');");
     $stmt->execute();
     $stores=$stmt->fetchAll();
     $stores_size=$stmt->rowcount();
 
     $stmt=$conn->prepare("select *  from magazine where  id in (select magazine from favorite_m where id ='".$u."');");
     $stmt->execute();
     $magazines=$stmt->fetchAll();
     $magazines_size=$stmt->rowcount();
 
     $stmt=$conn->prepare("select *  from code where  code in (select code from favorite_c where id ='".$u."');");
     $stmt->execute();
     $code=$stmt->fetchAll();
     $code_size=$stmt->rowcount();
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
                            إدارة المستخدمين
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account"></i>
              </span> </h3>
                    </div>
                    <div class="row">
                        <div class="rtl col-12 grid-margin">
                            <div class="card">
                            <form action="../../api/user/changeuserdata.php" enctype="multipart/form-data" method="post">
                                   <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-2">
                                                <div onclick="pro1()" class="nav-profile-image">
                                                    <input style="display:none;" name="image" type="file" id="file" onchange="display(this);">
                                                    <img  src="../../api/<?php echo$result[0]["picture"]; ?>" id="img" alt="profile">
                                                    <h5>ارفع صورة</h5>
                                                </div>

                                            </div>

                                            <div class="col-10">
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأسم</label>
                                                    <div class="col-10">
                                                        <input type="text" name="name" class="form-control" value="<?php echo$result[0]["name"]; ?>" id="">
                                                        <input type="hidden" name="id"  value="<?php echo $u; ?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الإيميل</label>
                                                    <div class="col-10">
                                                        <input type="email" name="email" class="form-control" value="<?php echo$result[0]["email"]; ?> " id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الهاتف</label>
                                                    <div class="col-5 ">
                                                        <input type="number" name="number" class="form-control" value="<?php echo $result[0]["phone"]; ?>" id="">
                                                    </div>
                                                    <div class="col-3 phone-code">
                                                        <input type="number"  id="code" class="form-control" value="<?php echo $country[0]["code"]; ?>" id="">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">النوع</label>
                                                    <div class="col-10"><select name="gender" class="form-control">
                                                        <?php if( $result[0]["gender"]==0)
                                                            echo'<option value="0">ذكر</option>
                                                            <option value="1">مؤنث</option>';
                                                           else
                                                           echo'<option value="1">مؤنث</option>
                                                           <option value="0">ذكر</option>';
                                                           ?>
                                                          </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">الدولة</label>
                                                    <div class="col-10"><select name="country" id="country" class="form-control" onchange="a(<?php echo $country[0][2] ?>)">
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
                                                    <div class="col-10"><select name="city" class="form-control ">
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
                                                    <label for="example-search-input" class="col-2 col-form-label">السن</label>
                                                    <div class="col-10"><select name="age" class="form-control">
                                                        <?php if( $result[0]["age"]==0)
                                                            echo'<option value="0">18-25</option>
                                                            <option value="1">25-40</option>
                                                            <option value="2">40-60</option>';
                                                           elseif( $result[0]["age"]==1)
                                                           echo'<option value="1">25-40</option>
                                                           <option value="0">18-25</option>
                                                           <option value="2">40-60</option>';
                                                          else
                                                           echo' <option value="2">40-60</option>
                                                           <option value="0">18-25</option>
                                                           <option value="1">25-40</option>
                                                          ';
                                                           ?>
                                                          </select>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <a onclick="delete_user(<?php echo$result[$i]['id']; ?>);"><button type="button" class="btn btn-danger btn-fw">مسح</button></a>
                                        <a href="Control.html"> <button type="submit" style="float:left" class="btn btn-outline-primary btn-round">تعديل</button></a>
                                </form></form>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">مفضلة المتاجر</h4>
                                    <div class="table-responsive">
                                        <table id="tableId" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> المتجر </th>
                                                    <th> عدد العروض </th>
                                                    <th> عدد النشرات </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody> <?php 
                                                for($i=0;$i<$stores_size;$i++)
                                                {
                                                   
                                                    $stmt=$conn->prepare("select count(code)  from store_code where  store_Id  ='". $stores[$i]['id']."';");
                                                    $stmt->execute();
                                                    $count_c=$stmt->fetchAll();
                                                    $stmt=$conn->prepare("select count(id)  from magazine where id in ( select id from magazine_branch where branch in (select id from store_branch where store  ='". $stores[$i]['id']."'));");
                                                    $stmt->execute();
                                                    $count_m=$stmt->fetchAll();
                                                   
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="../../api/<?php echo $stores[$i]['image'];?>" class="mr-2" alt="image"><?php echo $stores[$i]['name'];?></td>
                                                    <td><?php echo $count_c[0][0]; ?> </td>
                                                    <td> <?php echo $count_m[0][0]; ?> </td>
                                                    <td>
                                                    <form id="store" action="profile.php" method="POST"> <input type="hidden" name="id" value="<?php echo  $stores[$i]['id']; ?>">
                                                    <a onclick="document.getElementById('store').submit();"><label class="badge badge-gradient-info">صفحة المتجر</label></a></form>
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
                                    <h4 class="card-title">مفضلة النشرات</h4>
                                    <div class="table-responsive">
                                        <table id="tableId2" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> النشرة </th>
                                                    <th> عدد الصفحات </th>
                                                    <th> تاريخ الإنتهاء </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                for($i=0;$i<$magazines_size;$i++)
                                                {
                                                    $stmt=$conn->prepare("select name,image  from store where  id in (select store from store_branch where id in (select branch from magazine_branch where id ='".$magazines[$i]['id']."'));");
                                                    $stmt->execute();
                                                    $store=$stmt->fetchAll();
                                                    $stmt=$conn->prepare("select count(photo)  from magazine_photo where  id  ='".$magazines[$i]['id']."';");
                                                    $stmt->execute();
                                                    $count_photo=$stmt->fetchAll();
                                                   
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="../../api/<?php echo $store[0]['image'];?>" class="mr-2" alt="image"><?php echo $store[0]['name'];?> </td>
                                                    <td> <?php echo (int)($count_photo[0][0]+1);?> </td>
                                                    <td> <?php echo $magazines[$i]['end_date'];?> </td>
                                                    <td>
                                                    <form id="magazine" action="profile.php" method="POST"> <input type="hidden" name="id" value="<?php echo  $magazines[$i]['id']; ?>">
                                                    <a onclick="document.getElementById('maazine').submit();"><label class="badge badge-gradient-info">صفحة النشرة</label></a></form>
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
                                    <h4 class="card-title">مفضلة العروض والأكواد</h4>
                                    <div class="table-responsive">
                                        <table id="tableId3" class="rtl table">
                                            <thead>
                                                <tr>
                                                    <th> العرض </th>
                                                    <th> الخصم </th>
                                                    <th> الكود </th>
                                                    <th> خيارات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                for($i=0;$i<$code_size;$i++)
                                                {
                                                    $stmt=$conn->prepare("select name,image  from store where  id in  (select store_Id from store_code where code ='".$code[$i]['code']."');");
                                                    $stmt->execute();
                                                    $store=$stmt->fetchAll();
                                                  
                                                   
                                                ?>
                                                <tr>
                                                    <td>
                                                    <img src="../../api/<?php echo $store[0]['image'];?>" class="mr-2" alt="image"><?php echo $store[0]['name'];?> </td>
                                                    <td> <?php echo $code[$i]['data'];?> </td>
                                                    <td> <?php echo $code[$i]['code'];?></td>
                                                    <td>
                                                    <form id="code" action="profile.php" method="POST"> <input type="hidden" name="id" value="<?php echo  $code[$i]['code']; ?>">
                                                    <a onclick="document.getElementById('code').submit();"><label class="badge badge-gradient-info">صفحة العرض</label></a></form>
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


                    </div>
                    <!-- partial -->
                </div>
            </div>
            <!-- partial:partials/_sidebar.html -->
            <?php include '../../api/side-nav.php';?>
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
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
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
            
            function delete_user(x)
            {
               
                $.ajax({
              url: "../../api/user/delete.php",
              method: "POST",
              data: {
                  id : x
              },
              success: function (data) {
                setTimeout(function(){
                  window.location.href="users.php";
              },800)
              }
            });
            }
            function a(x)
            {
                
                $('.phone-code').html('');
                $.ajax({
              url: "../../api/phonebycountry.php",
              method: "POST",
              data: {
                  city : document.getElementById('country').value
              },
              success: function (data) {
                setTimeout(function(){
                  $('.phone-code').html(data);
                 
              },800)
              }
            });
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
    <!-- End custom js for this page -->
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
    </script>
</body>

</html>