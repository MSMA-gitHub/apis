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
                <a class="navbar-brand brand-logo" href="../home.html"><img src="../../assets/images/logo.png" alt="logo"></a>
                <a class="navbar-brand brand-logo-mini" href="../home.html"><img src="../../assets/images/logo-mini.png" alt="logo"></a>
            </div>
        </nav>
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
                                <form action="" onchange="validatyCoupon()">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-12">

                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">اسم الفرع</label>
                                                    <div class="col-10">
                                                        <input type="text" name="name" class="form-control" value="" id="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">الدولة</label>
                                                    <div class="col-10"><select name="sms" class=" form-control" required>
                                                        <option value="">اختر</option>
                                                        <option>خنثي</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">المدينة او المدن</label>
                                                    <div class="col-10"><select class="selectpicker form-control" multiple name="sms">
                                                        
                                                        <option>اختر</option>
                                                        <option>خنثي</option>
                                                      </select>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">العنوان</label>
                                                    <div class="col-10"><select name="sms" class="form-control" required>
                                                        <option value="">اختر</option>
                                                        <option>خنثي</option>
                                                      </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">سعر المنتج</label>
                                                    <div class="col-10">
                                                        <input type="number" name="name" class="form-control" value="" id="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">سعر المنتج</label>
                                                    <div class="col-10">
                                                        <input type="number" name="name" class="form-control" value="" id="" required>
                                                    </div>
                                                </div>
                                                <h5>مواعيد العمل :</h5>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">السبت من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="name" class="form-control" value="" id="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">السبت إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="name" class="form-control" value="" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأحد من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="name" class="form-control" value="" id="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأحد إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="name" class="form-control" value="" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأثنين من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="name" class="form-control" value="" id="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأثنين إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="name" class="form-control" value="" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الثلاثاء من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="name" class="form-control" value="" id="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الثلاثاء إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="name" class="form-control" value="" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأربعاء من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="name" class="form-control" value="" id="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأربعاء إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="name" class="form-control" value="" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الخميس من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="name" class="form-control" value="" id="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الخميس إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="name" class="form-control" value="" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الجمعة من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="name" class="form-control" value="" id="">
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الجمعة إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="name" class="form-control" value="" id="">
                                                    </div>
                                                </div>
                                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                                <div id="map"></div>
                                            </div>


                                        </div>
                                        <a href="Control.html"> <button type="button" class="btn btn-danger btn-fw">مسح</button></a>
                                        <a href="Control.html"> <button type="submit" style="float:left" class="btn btn-outline-primary btn-round">تعديل</button></a>
                                </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- partial -->
                </div>
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
                                <img src="../../assets/images/faces/face1.jpg" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../home.html">
                            <span class="menu-title">الرئيسية</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../magazine/magazine.html">
                            <span class="menu-title">اعلانات</span>
                            <i class="mdi mdi mdi-xaml menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/mdi.html">
                            <span class="menu-title">اضافة فئة جانبية</span>
                            <i class="mdi mdi-folder-plus menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../users/users.html">
                            <span class="menu-title">إدارة المستخدمين</span>
                            <i class="mdi mdi-account-settings menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/mdi.html">
                            <span class="menu-title">إدارة المتاجر</span>
                            <i class="mdi mdi-store menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/mdi.html">
                            <span class="menu-title">إدارة المنتجات</span>
                            <i class="mdi mdi-cart-outline menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/mdi.html">
                            <span class="menu-title">إدارة الأكواد</span>
                            <i class="mdi mdi-barcode menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/mdi.html">
                            <span class="menu-title">إدارة العروض</span>
                            <i class="mdi mdi-check-circle-outline menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/mdi.html">
                            <span class="menu-title">إدارة الصفقات</span>
                            <i class="mdi mdi-exclamation menu-icon"></i>
                        </a>

                </ul>
            </nav>
            <!-- partial -->

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgjNs4bm9AyrEM9ki-NDBI3yVibzxf7xQ&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        function pro1() {
            document.getElementById("file").click();
        }
    </script>

    <script>
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -33.8688,
                    lng: 151.2195
                },
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
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
    <!-- End custom js for this page -->
</body>

</html>