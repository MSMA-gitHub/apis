<?php
     require '../../api/db.php';
     $stmt=$conn->prepare("select *  from country");
     $stmt->execute();
     $countries=$stmt->fetchAll();
     $countries_size=$stmt->rowcount();
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
                                                        <input type="text" name="name" class="form-control" value=""  required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label for="example-search-input" class="col-2 col-form-label">الدولة</label>
                                                    <div class="col-10"><select name="country" id="country" class="form-control" onchange="a()">
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
                                                    <label for="example-search-input" class="col-2 col-form-label">المدينة او المدن</label>
                                                    <div class="col-10 cities"><select class="selectpicker form-control " multiple name="city[]">
                                                   <option value="">اختر  الدوله </option>
                                                      </select>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-2 col-form-label">العنوان</label>
                                                    <div class="col-10">
                                                        <input type="text" name="location" class="form-control" value=""  required>
                                                    </div>
                                                </div>
                                                
                                                <h5 style="text-align: center; margin-left:50px;">مواعيد العمل</h5>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">السبت من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="sat_o" class="form-control" value="" >
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">السبت إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="sat_c" class="form-control" value="" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأحد من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="sun_o" class="form-control" value="" >
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأحد إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="sun_c" class="form-control" value="" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأثنين من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="mon_o" class="form-control" value="" >
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأثنين إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="mon_c" class="form-control" value="" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الثلاثاء من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="tue_o" class="form-control" value="" >
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الثلاثاء إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="tue_c" class="form-control" value="" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الأربعاء من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="wen_o" class="form-control" value="" >
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الأربعاء إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="wen_c" class="form-control" value="" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الخميس من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="thu_o" class="form-control" value="" >
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الخميس إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="thu_c" class="form-control" value="" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-2">الجمعة من :</label>
                                                    <div class="col-4">
                                                        <div class="col-10">
                                                            <input type="time" name="fri_o" class="form-control" value="" >
                                                        </div>
                                                    </div>
                                                    <label for="example-search-input2" class="col-2">الجمعة إلي :</label>
                                                    <div class="col-4">
                                                        <input type="time" name="fri_c" class="form-control" value="" >
                                                    </div>
                                                </div>
                                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                                <div id="map"></div>
                                            </div>


                                        </div>
                                        <a> <button type="submit"  class="btn btn-outline-primary btn-round">اضافة</button></a> </form>
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
    <script>
            function a(x)
            {
                $('.cities').html('');
                $.ajax({
              url: "../../api/store/citiesbycountry.php",
              method: "POST",
              data: {
                  city : document.getElementById('country').value
              },
              success: function (data) {
                setTimeout(function(){
                    console.log(data);
                  $('.cities').html(data);
              },800)
              }
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