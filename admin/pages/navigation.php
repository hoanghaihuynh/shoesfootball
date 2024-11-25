<body>
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
                        <a class="nav-link active" href="<?php echo $site_domain?>/admin/home.php">
                            Trang Chủ
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
                                <img src="<?php echo $site_logo;?>" alt="image">
                                <span class="sidebar-status-indicator"></span>
                            </div>
                            <div class="sidebar-profile-name">
                                <p class="sidebar-name">
                                    <?php echo $site_email;?>
                                </p>
                                <p class="sidebar-designation">
                                    Quản trị viên
                                </p>
                            </div>
                        </div>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $site_domain?>/admin/home.php">
                            <i class="typcn typcn-device-desktop menu-icon"></i>
                            <span class="menu-title">Trang chủ <span
                                    class="badge badge-primary ml-3">Chính</span></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="typcn typcn-briefcase menu-icon"></i>
                            <span class="menu-title">Sản Phẩm</span>
                            <i class="typcn typcn-chevron-right menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <!--<li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>-->
                                <!--<li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>-->
                                <!--<li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>-->
                                <li class="nav-item"> <a class="nav-link"
                                        href="<?php echo $site_domain?>/admin/pages/post/addProduct.php">Đăng
                                        Sản Phẩm</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="<?php echo $site_domain?>/admin/pages/post/listProduct.php">Danh
                                        Sách Sản Phẩm</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="typcn typcn-briefcase menu-icon"></i>
                            <span class="menu-title">Đơn Hàng</span>
                            <i class="typcn typcn-chevron-right menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link"
                                        href="<?php echo $site_domain?>/admin/pages/donhang/dsdonhang.php">Danh
                                        Sách Đơn Hàng</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="typcn typcn-briefcase menu-icon"></i>
                            <span class="menu-title">Cài Đặt Chung</span>
                            <i class="typcn typcn-chevron-right menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <!--<li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>-->
                                <!--<li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>-->
                                <!--<li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>-->
                                <li class="nav-item"> <a class="nav-link"
                                        href="<?php echo $site_domain?>/admin/pages/settings/setting.php">Cài
                                        Đặt Giao Diện</a></li>

                                <li class="nav-item"> <a class="nav-link"
                                        href="<?php echo $site_domain?>/admin/pages/settings/listbannerm.php">Danh Sách
                                        Banner</a></li>
                               
                            </ul>
                        </div>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="typcn typcn-briefcase menu-icon"></i>
                            <span class="menu-title">Cài Đặt Danh Mục</span>
                            <i class="typcn typcn-chevron-right menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link"
                                        href="<?php echo $site_domain?>/admin/pages/danhmuc/danhmuc.php">Thêm
                                        Danh Mục</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="<?php echo $site_domain?>/admin/pages/danhmuc/dsdanhmuc.php">Danh
                                        Sách Danh Mục</a></li>
                            </ul>
                        </div>
                    </li>
                   
                </ul>

            </nav>