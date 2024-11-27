<?php
require_once('./config/database.php');
include_once('./components/header.php');
include_once('./components/nav.php');
$email = $_SESSION["user"];
$magiamgia = $_GET["magiamgia"];
$disableBuyButton = false; // Mặc định là false, tức là nút mua hàng không bị khóa
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Giỏ hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="./home.php">Trang chủ</a>
                        <a href="./shop.php?danhmuc=">Cửa hàng</a>
                        <span>Giỏ hàng của tôi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
 
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qty = 0;
                            $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                            while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                //lấy ds sản phẩm có trong giỏ hàng của user
                                $qty += 1;
                                ?>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img style="max-height:100px" src="<?php echo '' . $row1["image"] ?>" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>
                                                <?php echo '' . $row1["name"] ?>
                                            </h6>
                                            <h5>
                                                <?php echo '' . number_format($row1["price"]) ?>
                                            </h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="#">
                                                <?php
                                                $quantityValue = $row1["soluong"];
                                                // Kiểm tra nếu số lượng vượt quá 99, thì hiển thị thông báo và khóa nút mua hàng
                                                if ($quantityValue > 99) {
                                                    echo   $quantityValue = $row1["soluong"];
                                                    echo '<br><span style="color: red;">Vui lòng chọn lại số lượng</span>';
                                                    $disableBuyButton = true; // Khóa nút mua hàng
                                                } else {
                                                    echo '<input value="' . $quantityValue . '">';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">
                                        <?php echo '' . number_format($row1["price"] * $row1["soluong"]) ?>
                                        VNĐ
                                    </td>

                                    <form method="post" action="dao/addCart.php">
                                        <input type="hidden" name="xoaCart" value="<?php echo '' . $row1["id"] ?>">
                                        <td class="cart__close" data-title="Xóa">
                                            <button class="cart__close" type="submit"><i class="fa fa-close"></i></button>
                                        </td>
                                    </form>
                                </tr>
                            <?php }
                            if ($qty == 0) { ?>
                                <td class="image" data-title="STT">
                                    <p>Không có sản phẩm nào trong giỏ hàng</p>
                                </td>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="shop.php?danhmuc=">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Cập nhật giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>Tổng Tiền Giỏ Hàng</h6>
                    <ul>
                        <li class="last">Tổng <span>
                                <?php $qty = 0;
                                $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
                                while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                    $qty += $row1['tongtien'];
                                }
                                $tiengiam = 0;
                                $query = $conn->query("SELECT * FROM `magiamgia` WHERE `magiam` = '$magiamgia' AND `soluong` > 0");
                                while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                    $tiengiam = $row1['sotien'];
                                }
                                //tinhs tong so tien khi apply ma giam gia
                                if ($qty - $tiengiam >= 0) {
                                    echo number_format($qty - $tiengiam);
                                } else {
                                    echo '0';
                                }
                                ?> VNĐ
                            </span></li>
                    </ul>
                    <!-- Kiểm tra nút mua hàng có bị khóa không -->
                    <?php if (!$disableBuyButton) { ?>
                        <a href="checkout.php?magiamgia=<?php echo $magiamgia ?>" class="primary-btn">Mua hàng</a>
                    <?php } else { ?>
                        <p style="color: red;">Không thể mua hàng với số lượng sản phẩm trên 99</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shopping Cart Section End -->

<!-- Footer Section Begin -->
<?php
include_once('./components/footer.php');
?>
