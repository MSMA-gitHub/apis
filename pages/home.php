<?php
header("location:basicData/basicData.php");
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orody Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">


    <link rel="stylesheet" href="../assets/css/dataTables.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="../assets/images/favicon.png">
</head>

<body class="">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

            <div class="navbar-menu-wrapper d-flex align-items-stretch">

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Admin name</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> تسجيل خروج </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button><button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>

            </div>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" ><img src="../assets/images/logo.png" alt="logo"></a>
                <a class="navbar-brand brand-logo-mini" ><img src="../assets/images/logo-mini.png" alt="logo"></a>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            الرئيسية
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
              </span> </h3>
                    </div>

                </div>
                <!-- partial -->
            </div>
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">Admin name</span>
                                <span class="text-secondary text-small">Project Manager</span>
                            </div>
                            <div class="nav-profile-image">
                                <img src="../assets/images/faces/face1.jpg" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">
                            <span class="menu-title">الرئيسية</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ads/ads.php">
                            <span class="menu-title">إدارة الاعلانات</span>
                            <i class="mdi mdi mdi-xaml menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="subcategory/subcategory.php">
                            <span class="menu-title">اضافة فئة جانبية</span>
                            <i class="mdi mdi-folder-plus menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users/users.php">
                            <span class="menu-title">إدارة المستخدمين</span>
                            <i class="mdi mdi-account-settings menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="brand/brand.php">
                            <span class="menu-title">إدارة الماركات</span>
                            <i class="mdi mdi-bookmark-plus-outline menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stores/stores.php">
                            <span class="menu-title">إدارة المتاجر</span>
                            <i class="mdi mdi-store menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product/product.php">
                            <span class="menu-title">إدارة المنتجات</span>
                            <i class="mdi mdi-cart-outline menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="coupons/coupons.php">
                            <span class="menu-title">إدارة الأكواد</span>
                            <i class="mdi mdi-barcode menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="offers/offers.php">
                            <span class="menu-title">إدارة العروض</span>
                            <i class="mdi mdi-check-circle-outline menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deals/deals.php">
                            <span class="menu-title">إدارة الصفقات</span>
                            <i class="mdi mdi-exclamation menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="magazines/magazines.php">
                            <span class="menu-title">إدارة النشرات</span>
                            <i class="mdi mdi-newspaper menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->



    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function() {
            $('#tableId').DataTable();
        });
    </script>
</body>

</html>