<?php
session_start();
echo' <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

<div class="navbar-menu-wrapper d-flex align-items-stretch">

    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="../#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-text">
                    <p class="mb-1 text-black">'.$_SESSION["orodyadmin"].'</p>
                </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../../api/signout.php">
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
    <a class="navbar-brand brand-logo" href="../home.php"><img src="../../assets/images/logo.png" alt="logo"></a>
    <a class="navbar-brand brand-logo-mini" href="../home.php"><img src="../../assets/images/logo-mini.png" alt="logo"></a>
</div>
</nav>';
?>