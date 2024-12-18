<?php
require_once('../config/database.php');
if ($_SESSION['email'] == null) {
    header("Location: $site_domain/admin");
}
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang Quản Trị</title>
    <!-- base:css -->
    <link rel="stylesheet" href="./vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="./css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="./images/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body style="display:flex !important;">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#" style="padding-right:10px"> ADMIN</a>
                <a class="navbar-brand brand-logo-mini" href="#" style="padding-right:10px"> ADMIN</a>
                <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button"
                    data-toggle="minimize">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item  d-none d-lg-flex">
                        <a class="nav-link active" href="<?php echo $site_domain ?>/logout.php">
                            Đăng xuất
                        </a>
                    </li>
                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <div class="d-flex sidebar-profile">
                            <div class="sidebar-profile-image">
                                <img src="<?php echo $site_logo; ?>" alt="image">
                                <span class="sidebar-status-indicator"></span>
                            </div>
                            <div class="sidebar-profile-name">
                                <p class="sidebar-name">
                                    <?php echo $site_email; ?>
                                </p>
                                <p class="sidebar-designation">
                                    Quản trị viên
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $site_domain ?>/admin/home.php">
                            <i class="bi bi-house-door menu-icon"></i> <!-- Icon Trang chủ -->
                            <span class="menu-title">Trang chủ <span class="badge badge-primary ml-3">Chính</span></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="bi bi-box menu-icon"></i> <!-- Icon Sản phẩm -->
                            <span class="menu-title">Sản Phẩm</span>
                            <i class="bi bi-chevron-down menu-arrow"></i> <!-- Mũi tên xuống -->
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_domain ?>/admin/pages/post/addProduct.php">Đăng Sản Phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_domain ?>/admin/pages/post/listProduct.php">Danh Sách Sản Phẩm</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="form-elements">
                            <i class="bi bi-cart menu-icon"></i> <!-- Icon Đơn hàng -->
                            <span class="menu-title">Đơn Hàng</span>
                            <i class="bi bi-chevron-down menu-arrow"></i> <!-- Mũi tên xuống -->
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_domain ?>/admin/pages/donhang/dsdonhang.php">Danh Sách Đơn Hàng</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="ui-basic">
                            <i class="bi bi-gear menu-icon"></i> <!-- Icon Cài đặt chung -->
                            <span class="menu-title">Cài Đặt Chung</span>
                            <i class="bi bi-chevron-down menu-arrow"></i> <!-- Mũi tên xuống -->
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_domain ?>/admin/pages/settings/setting.php">Cài Đặt Giao Diện</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="form-elements">
                            <i class="bi bi-list menu-icon"></i> <!-- Icon Cài đặt danh mục -->
                            <span class="menu-title">Cài Đặt Danh Mục</span>
                            <i class="bi bi-chevron-down menu-arrow"></i> <!-- Mũi tên xuống -->
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_domain ?>/admin/pages/danhmuc/danhmuc.php">Thêm Danh Mục</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_domain ?>/admin/pages/danhmuc/dsdanhmuc.php">Danh Sách Danh Mục</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- partial -->
            <div class="main-panel" style="margin-top:60px importain!">
                <div class="row">


                    <div class="card card-service box-service-panel">
                        <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                            title="Trao đổi người theo dõi profile để kiếm tiền.">
                            <div class="box-body text-center">
                                <a>Sản Phẩm </a><br>
                                <h3><?php

                                    $qty = 0;
                                    $query1 = $conn->query("SELECT * FROM `products`");
                                    while ($row11 = $query1->fetch(PDO::FETCH_ASSOC)) {
                                        //tính số sản phẩm hiện có
                                        $qty += 1;
                                    }

                                    echo $qty;
                                    ?></h3>
                                <hr>
                                <a rel="nofollow"
                                    href="<?php echo $site_domain ?>/admin/pages/post/listProduct.php"><button
                                        class="btn btn-danger btn-block">Xem Ngay</button></a>
                            </div>
                        </div>
                    </div>



                    <div class="card card-service box-service-panel">
                        <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                            title="Trao đổi người theo dõi profile để kiếm tiền.">
                            <div class="box-body text-center">
                                <a>Đơn Hàng </a><br>
                                <h3><?php

                                    $qty = 0;
                                    $query1 = $conn->query("SELECT * FROM `donhang`");
                                    while ($row11 = $query1->fetch(PDO::FETCH_ASSOC)) {
                                        $qty += 1;
                                        //tính số đơn hàng hiện có
                                    }

                                    echo $qty;
                                    ?></h3>
                                <hr>
                                <a rel="nofollow"
                                    href="<?php echo $site_domain ?>/admin/pages/donhang/dsdonhang.php"><button
                                        class="btn btn-success btn-block">Xem Ngay</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="card card-service box-service-panel">
                        <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                            title="Trao đổi người theo dõi profile để kiếm tiền.">
                            <div class="box-body text-center">
                                <a>Danh Mục </a><br>
                                <h3><?php

                                    $qty = 0;
                                    $query1 = $conn->query("SELECT * FROM `danhmuc`");
                                    while ($row11 = $query1->fetch(PDO::FETCH_ASSOC)) {
                                        $qty += 1;
                                    }

                                    echo $qty;
                                    ?></h3>
                                <hr>
                                <a rel="nofollow"
                                    href="<?php echo $site_domain ?>/admin/pages/danhmuc/dsdanhmuc.php"><button
                                        class="btn btn-info btn-block">Xem Ngay</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="card card-service box-service-panel">
                        <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                            title="Trao đổi người theo dõi profile để kiếm tiền.">
                            <div class="box-body text-center">
                                <a>Số Giảm Giá </a><br>
                                <h3><?php

                                    $qty = 0;
                                    $query1 = $conn->query("SELECT * FROM `magiamgia`");
                                    while ($row11 = $query1->fetch(PDO::FETCH_ASSOC)) {
                                        $qty += 1;
                                    }

                                    echo $qty;
                                    ?></h3>
                                <hr>
                                <a rel="nofollow"
                                    href="<?php echo $site_domain ?>/admin/pages/giamgia/dsgiamgia.php"><button
                                        class="btn btn-primary btn-block">Xem Ngay</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="card card-service box-service-panel">
                        <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                            title="Trao đổi người theo dõi profile để kiếm tiền.">
                            <div class="box-body text-center">
                                <a>Tin Tức </a><br>
                                <h3><?php

                                    $qty = 0;
                                    $query1 = $conn->query("SELECT * FROM `tintuc`");
                                    while ($row11 = $query1->fetch(PDO::FETCH_ASSOC)) {
                                        $qty += 1;
                                    }

                                    echo $qty;
                                    ?></h3>
                                <hr>
                                <a rel="nofollow"
                                    href="<?php echo $site_domain ?>/admin/pages/tintuc/dstintuc.php"><button
                                        class="btn btn-info btn-block">Xem Ngay</button></a>
                            </div>
                        </div>
                    </div>




                </div>




            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
    <script src="vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>