<?php
require_once('./config/database.php');
$email = $_SESSION["user"];
$sqlu = "SELECT * FROM user WHERE email = '$email'";
//get thông tin của người dùng hiện tại
$result = $conn->query($sqlu);
$users = $result->fetch(PDO::FETCH_ASSOC);

// $users_name = $users['name'];
// $users_money = $users['money'];
$users_quyen = $users['phanquyen'];
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e54c8;
            --secondary-color: #8f94fb;
            --accent-color: #ff6b6b;
            --background-color: #f8f9fa;
            --text-color: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        #sidebar {
            min-width: 175px;
            max-width: 175px;
            min-height: 100vh;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            transition: all 0.3s;
        }

        #sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s;
        }

        #sidebar .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        #sidebar.active {
            margin-left: -250px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-toggle {
            background-color: var(--accent-color);
            color: white;
        }

        .btn-toggle:hover {
            background-color: #ff8585;
        }

        .table {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .progress {
            height: 8px;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }
        }

        /* Con trỏ dạng pointer khi hover */
        .custom-hover {
            cursor: pointer;
            /* Thay đổi con trỏ chuột */
            transition: background-color 0.3s ease, opacity 0.3s ease;
            /* Hiệu ứng mượt */
        }

        /* Hiệu ứng mờ dần nền khi hover */
        .custom-hover:hover {
            background-color: rgba(255, 255, 255, 0.1);
            /* Nền mờ đi */
            opacity: 0.8;
            /* Độ trong suốt */
        }

        /* Đặt dropdown của "Cửa hàng" đứng trên các phần tử khác */
        #sidebar .dropdown-menu {
            z-index: 1050;
            /* Đặt z-index cao để đảm bảo luôn trên các phần tử khác */
            position: relative;
            /* Đảm bảo vị trí menu không bị ảnh hưởng bởi phần tử cha */
        }

        /* Đảm bảo toàn bộ sidebar không ảnh hưởng tới các phần tử con */
        #sidebar {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links"><?php
                                            if (!isset($_SESSION["user"])) {
                                            ?>
                    <a href="#">Đăng nhập</a><?php } ?>
                <a href="#">FAQs</a> <?php if ($users_quyen == 99) { ?><a href="<?php echo $site_domain ?>/admin">Trang
                        Quản
                        Trị</a>
                    <?php } ?><?php if (isset($_SESSION["user"])) {
                                ?>
                    <a href="<?php echo $site_domain ?>/logout.php">Đăng xuất</a><?php } ?>
            </div>

        </div>

        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p><?php echo $site_email ?></p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <!-- Sidebar -->
        <div class="d-flex">
            <nav id="sidebar" class="position-fixed vh-100 bg-dark text-white">
                <div class="position-sticky pt-3">
                    <div class="px-2 py-4">
                        <h3 class="text-white fs-5">SHOOSE STORE</h3>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="./home.php">
                                <i class="fas fa-home me-2"></i>Trang Chủ
                            </a>
                        </li>
                        <!-- Dropdown for Cửa hàng -->
                        <li class="nav-item dropend position-relative">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="shopDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-store me-2"></i>Cửa hàng
                            </a>
                            <ul class="dropdown-menu bg-dark text-white border-0 position-absolute" aria-labelledby="shopDropdown">
                                <li>
                                    <a class="dropdown-item custom-hover text-white" href="./home.php?filter=best-sellers">Bán chạy nhất</a>
                                </li>
                                <li>
                                    <a class="dropdown-item custom-hover text-white" href="./home.php?filter=new-products">Sản phẩm mới</a>
                                </li>
                                <li>
                                    <a class="dropdown-item custom-hover text-white" href="./home.php?filter=discounts">Giảm giá sốc</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./donhang.php">
                                <i class="fas fa-box me-2"></i>Đơn hàng
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="content" class="flex-grow-1">
                <div class="header__top bg-white shadow-sm">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-7">
                                <div class="header__top__left d-flex align-items-center text-dark">
                                    <button type="button" id="sidebarCollapse" class="btn btn-danger btn-sm me-2">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <!-- <p class="mb-0 text-dark"><?php echo $site_email ?></p> -->
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 text-end">
                                <div class="header__top__right">

                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i style="font-size: 24px;" class="fa fa-user-circle-o"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">user@gmail.com</a></li>
                                            <?php if ($users_quyen == 99) { ?>
                                                <li><a class="dropdown-item" href="<?php echo $site_domain ?>admin/index.php">Trang Quản Trị</a></li>
                                            <?php } ?>
                                            <?php if (isset($_SESSION["user"])) { ?>
                                                <li><a class="dropdown-item" href="<?php echo $site_domain ?>/logout.php">Đăng xuất</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <nav class="header__menu mobile-menu">
                                <ul>
                                    <!-- <li class="active"><a href="./index.php"><i class="fas fa-home me-2"></i>Trang chủ</a></li> -->
                                    <!-- <li><a href="./shop.php?danhmuc=">Cửa hàng</a></li> -->
                                    <!-- <li><a href="./donhang.php">Đơn hàng đã mua</a></li> -->
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="header__nav__option">
                                <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                                <a href="<?php echo $site_domain ?>/shopping-cart.php?magiamgia="><img src="img/icon/cart.png"
                                        alt="">
                                    <span><?php
                                            $qty = 0;
                                            $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                                            while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                                //lấ ds sản phẩm có trong giỏ hàng của user
                                                $qty += 1;

                                            ?>
                                        <?php }
                                            echo $qty; ?>
                                    </span></a>
                                <div class="price"><?php $qty = 0;
                                                    $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                                                    while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                                        $qty += $row1['tongtien'];
                                                    ?> <?php }
                                                    echo number_format($qty); ?> VNĐ</div>
                            </div>
                        </div>
                    </div>
                    <div class="canvas__open"><i class="fa fa-bars"></i></div>
                </div>
            </div>
            <!-- Header top-->

        </div>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('sidebar');
            var sidebarCollapse = document.getElementById('sidebarCollapse');

            sidebarCollapse.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
</body>