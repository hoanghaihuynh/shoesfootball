<?php
  require_once('./config/database.php');
    $email = $_SESSION["user"];
    $sqlu = "SELECT * FROM user WHERE email = '$email'";
    //get thông tin của người dùng hiện tại
  $result = $conn->query($sqlu);
  $users = $result->fetch(PDO::FETCH_ASSOC);
  
  $users_name = $users['name'];
  $users_money = $users['money'];
  $users_quyen = $users['phanquyen'];
?>

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
                    if(!isset($_SESSION["user"])){
                  ?>
                <a href="#">Đăng nhập</a><?php }?>
                <a href="#">FAQs</a> <?php if($users_quyen == 99){?><a href="<?php echo $site_domain?>/admin">Trang
                    Quản
                    Trị</a>
                <?php }?><?php if(isset($_SESSION["user"])){
                  ?>
                <a href="<?php echo $site_domain?>/logout.php">Đăng xuất</a><?php }?>
            </div>

        </div>

        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p><?php echo $site_email?></p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p><?php echo $site_email?></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <?php
                    if(!isset($_SESSION["user"])){
                  ?>
                                <a href="#">Đăng nhập</a>
                                <?php }?>
                                <a href="#">FAQs</a>
                                <?php if($users_quyen == 99){?>
                                <a href="<?php echo $site_domain?>/admin">Trang Quản Trị</a>
                                <?php }?>
                                <?php if(isset($_SESSION["user"])){
                  ?>
                                <a href="<?php echo $site_domain?>/logout.php">Đăng xuất</a><?php }?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.php">SHOPQUANAO</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="./index.php">Trang chủ</a></li>
                            <li><a href="./shop.php?danhmuc=">Cửa hàng</a></li>
                            <li><a href="./donhang.php">Đơn hàng đã mua</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">

                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>

                        <a href="<?php echo $site_domain?>/shopping-cart.php?magiamgia="><img src="img/icon/cart.png"
                                alt="">
                            <span><?php 
						        $qty= 0;
                                $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                    //lấ ds sản phẩm có trong giỏ hàng của user
                                    $qty += 1;
                                    
                                ?>
                                <?php }echo $qty;?>
                            </span></a>
                        <div class="price"><?php $qty= 0;
                                $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    $qty += $row1['tongtien'];
                                ?> <?php }echo number_format($qty);?> VNĐ</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>