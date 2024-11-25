<?php
  require_once('./config/database.php');
  include_once('./components/header.php');
  include_once('./components/nav.php');
   $email = $_SESSION["user"];
  $magiamgia = $_GET["magiamgia"];
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thông tin thanh toán</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Trang chủ</a>
                        <a href="./shop.php?danhmuc=">Cửa hàng</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post" action="dao/addOrder.php?magiam=<?php echo $magiamgia?>&magiamgia=<?php $qty= 0;
                                $query = $conn->query("SELECT * FROM `magiamgia` WHERE `magiam` = '$magiamgia' AND `soluong` > 0");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    $qty = $row1['sotien'];
                                }
                                echo $qty;
                                ?>">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <!-- <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                                here</a> to enter your code</h6> -->
                        <h6 class="checkout__title">CHI TIẾT THANH TOÁN</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ và tên<span>*</span></p>
                                    <input type="text" name="kh_ten" required>
                                </div>
                            </div>

                        </div>

                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input name="kh_diachi" type="text" placeholder="Nhập địa chỉ chi tiết"
                                class="checkout__input__add" required>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="kh_dienthoai" required>
                                </div>
                            </div>

                        </div>


                        <div class="checkout__input">
                            <p>Ghi chú đặt hàng</p>
                            <input type="text" placeholder="Ghi chú đặt hàng" name="note" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                            <ul class="checkout__total__products">
                                <?php 
						        $qty= 0;
                                $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                    //lấ ds sản phẩm có trong giỏ hàng của user
                                    $qty += 1;
                                ?>
                                <li> <?php echo ''.$row1["name"]?>
                                    <span style="color:red"><?php echo ''.$row1["soluong"]?> x
                                        <?php echo ''.number_format($row1["price"])?></span>
                                </li>
                                <?php }if($qty==0){?>
                                <td class="image" data-title="STT">

                                    <p>Không có sản phẩm nào trong giỏ hàng</p>
                                </td>
                                <?php }?>
                            </ul>
                            <ul class="checkout__total__all">
                                <!-- <li>Giảm Giá<span><?php $qty= 0;
                               // $query = $conn->query("SELECT * FROM `magiamgia` WHERE `magiam` = '$magiamgia' AND `soluong` > 0");
                                //while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                  //  $qty = $row1['sotien'];
                                //}
                                //echo number_format($qty);
                                ?> VNĐ</span></li> -->
                                <li class="last">Tổng <span>
                                        <?php $qty= 0;
                                $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    $qty += $row1['tongtien'];
                                }
                                $tiengiam= 0;
                                $query = $conn->query("SELECT * FROM `magiamgia` WHERE `magiam` = '$magiamgia' AND `soluong` > 0");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    $tiengiam = $row1['sotien'];
                                }
                                //tinhs tong so tien khi apply ma giam gia
                                if($qty-$tiengiam>=0){
                                    echo number_format($qty-$tiengiam);
                                }else{
                                    echo '0';
                                }
                                ?> VNĐ</span></li>
                            </ul>

                            <button type="submit" name="addOrder" class="site-btn">Đặt ngay</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<!-- Footer Section Begin -->
<?php
include_once('./components/footer.php');
?>