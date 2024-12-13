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
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -250px;
            transition: all 0.3s ease;
            z-index: 1050;
        }

        #sidebarCloseBtn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            z-index: inherit;
        }

        #sidebar.active {
            left: 0;
        }

        #sidebar ul {
            padding-left: 0;
            list-style: none;

        }

        #sidebar ul li a {
            color: white;
            padding: 15px;
            display: block;
            text-decoration: none;
        }

        #sidebar ul li a:hover {
            background-color: #495057;
        }

        /* Top Bar */
        .topbar {
            z-index: 1040;
        }

        /* Hides hamburger and sidebar on large screens */
        @media (min-width: 769px) {
            #sidebar {
                display: none;
                /* Hide sidebar on screens larger than 768px */
            }

            #sidebarToggle {
                display: none;
                /* Hide hamburger button on screens larger than 768px */
            }
        }

        /* Shows hamburger button and sidebar on small screens */
        @media (max-width: 768px) {
            #sidebar {
                position: fixed;
                left: -250px;
            }

            #sidebar.active {
                left: 0;
            }

            #sidebarToggle {
                display: block;
                /* Show hamburger button on screens smaller than 768px */
            }
        }

        /* Optional: Add padding to the body when sidebar is active */
        body.sidebar-active {
            padding-left: 250px;
            /* Push content when sidebar is shown */
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header">
        <!-- Top Bar -->
        <div class="topbar bg-dark text-white py-2">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <!-- Hamburger Button -->
                    <div class="col-auto">
                        <button class="btn btn-dark" id="sidebarToggle">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>

                    <!-- Centered Text -->
                    <div class="col-auto text-center">
                        <span>SHOESFOOTBALL | Since 2024</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <button id="sidebarCloseBtn">
                <i class="fas fa-times"></i>
            </button>
            <div class="position-sticky pt-3">
                <div class="px-2 py-4">
                    <h3 class="text-white fs-5">SHOES STORE</h3>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="./home.php">
                            <i class="fas fa-home me-2"></i>Trang Chủ
                        </a>
                    </li>
                    <li class="nav-item dropend position-relative">
                        <a class="nav-link dropdown-toggle" href="#" id="shopDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-store me-2"></i>Cửa hàng
                        </a>
                        <ul class="dropdown-menu bg-dark text-white border-0 position-absolute" aria-labelledby="shopDropdown">
                            <li><a class="dropdown-item custom-hover text-white" href="./home.php?filter=best-sellers">Bán chạy nhất</a></li>
                            <li><a class="dropdown-item custom-hover text-white" href="./home.php?filter=new-products">Sản phẩm mới</a></li>
                            <li><a class="dropdown-item custom-hover text-white" href="./home.php?filter=discounts">Giảm giá sốc</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./donhang.php">
                            <i class="fas fa-box me-2"></i>Đơn hàng
                        </a>
                    </li>
                    <!-- Thêm item tìm kiếm vào sidebar -->
                    <li class="nav-item">
                        <a class="nav-link" href="./search.php">
                            <i class="fas fa-search me-2"></i>Tìm kiếm
                        </a>
                    </li>
                    <!-- Thêm item giỏ hàng vào sidebar -->
                    <li class="nav-item">
                        <a class="nav-link" href="./shopping-cart.php?magiamgia=">
                            <i class="fas fa-shopping-cart me-2"></i>Giỏ hàng
                            <span class="badge bg-danger" id="cartQty">
                                <?php
                                // Đếm số lượng sản phẩm trong giỏ hàng
                                $email = $_SESSION["user"];
                                $qty = 0;
                                $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                    $qty += 1;
                                }
                                echo $qty;
                                ?>
                            </span>
                        </a>
                    </li>
                    <!-- Thêm item đăng xuất vào sidebar -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $site_domain ?>/logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="content" class="flex-grow-1">
            <div class="header__top bg-white shadow-sm">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- header__top__left (Chuyển từ middle) -->
                        <div class="col-lg-6 col-md-6">
                            <nav class="header__top__left">
                                <ul class="list-inline m-0 p-0">
                                    <li class="list-inline-item">
                                        <a href="./home.php" class="text-dark text-decoration-none">Trang chủ</a>
                                    </li>
                                    <li class="list-inline-item dropdown">
                                        <a href="#" class="text-dark text-decoration-none dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Cửa hàng
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="./home.php?filter=best-sellers">Bán chạy nhất</a></li>
                                            <li><a class="dropdown-item" href="./home.php?filter=new-products">Sản phẩm mới</a></li>
                                            <li><a class="dropdown-item" href="./home.php?filter=discounts">Giảm giá sốc</a></li>
                                        </ul>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="./donhang.php" class="text-dark text-decoration-none">Đơn hàng</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- header__top__right -->
                        <div class="col-lg-6 col-md-6 text-end">
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
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        // Toggle Sidebar when hamburger button is clicked
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        document.getElementById('sidebarCloseBtn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('active');
            document.body.classList.remove('sidebar-active'); // Remove padding from content when sidebar is closed
        });
    </script>
</body>