<?php
require_once('./config/database.php');
include_once('./components/header.php');
include_once('./components/nav.php');

$email = $_SESSION["user"];
$magiamgia = isset($_GET["magiamgia"]) ? $_GET["magiamgia"] : null;
$disableBuyButton = false; // Mặc định là false, tức là nút mua hàng không bị khóa
$error_message = "";

// Lấy dữ liệu giỏ hàng
$query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
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
                <form id="updateCartForm">
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
                                $totalPrice = 0;
                                while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                    $totalPrice += $row1["price"] * $row1["soluong"];
                                    ?>
                                    <tr id="product-<?php echo $row1['id']; ?>">
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img style="max-height:100px" src="<?php echo $row1["image"]; ?>" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6><?php echo $row1["name"]; ?></h6>
                                                <h5><?php echo number_format($row1["price"]); ?> VNĐ</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <input type="number" name="quantities[<?php echo $row1['id']; ?>]" 
                                                       value="<?php echo $row1["soluong"]; ?>" 
                                                       min="1" max="99" class="quantity-input" style="width: 60px;" 
                                                       data-id="<?php echo $row1['id']; ?>" data-price="<?php echo $row1['price']; ?>" />
                                            </div>
                                        </td>
                                        <td class="cart__price" id="price-<?php echo $row1['id']; ?>">
                                            <?php echo number_format($row1["price"] * $row1["soluong"]); ?> VNĐ
                                        </td>
                                        <td class="cart__close">
                                            <a href="dao/addCart.php?xoaCart=<?php echo $row1['id']; ?>" class="cart__close"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                                if ($totalPrice == 0) { ?>
                                    <tr>
                                        <td colspan="4">
                                            <p>Không có sản phẩm nào trong giỏ hàng.</p>
                                        </td>
                                    </tr>
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
                                <button type="submit" class="primary-btn"><i class="fa fa-spinner"></i> Cập nhật giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>Tổng Tiền Giỏ Hàng</h6>
                    <ul>
                        <li class="last">Tổng <span id="finalTotal">
                            <?php echo number_format($totalPrice); ?> VNĐ
                        </span></li>
                    </ul>
                    <a href="checkout.php?magiamgia=<?php echo $magiamgia; ?>" class="primary-btn">Mua hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shopping Cart Section End -->

<!-- Footer Section Begin -->
<?php include_once('./components/footer.php'); ?> 

<!-- JavaScript to handle AJAX for updating the cart -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Xử lý form cập nhật giỏ hàng
    $("#updateCartForm").on("submit", function(event) {
        event.preventDefault(); // Ngừng form gửi mặc định

        // Lấy dữ liệu từ form
        var formData = $(this).serialize();

        // Gửi yêu cầu AJAX
        $.ajax({
            url: `<?php echo $site_domain?>/config/update_cart.php`, // Tạo file PHP xử lý cập nhật
            type: "POST",
            data: formData,
            success: function(response) {
                // Cập nhật giao diện nếu thành công
                alert("Giỏ hàng đã được cập nhật!");
                location.reload(); // Reload trang để cập nhật
            },
            error: function(xhr, status, error) {
                // Hiển thị lỗi nếu có
                alert("Có lỗi xảy ra. Vui lòng thử lại.");
            }
        });
    });
});
$(document).ready(function() {
    // Khi thay đổi số lượng sản phẩm
    $(".quantity-input").on("input", function() {
        var productId = $(this).data("id");
        var price = $(this).data("price");
        var quantity = $(this).val();
        var totalPriceForProduct = price * quantity;
        
        // Cập nhật giá sản phẩm
        $("#price-" + productId).text(number_format(totalPriceForProduct) + " VNĐ");
        
        // Tính tổng tiền lại
        var newTotalPrice = 0;
        $(".quantity-input").each(function() {
            var productId = $(this).data("id");
            var price = $(this).data("price");
            var quantity = $(this).val();
            newTotalPrice += price * quantity;
        });

        // Hiển thị tổng tiền mới
        $("#finalTotal").text(number_format(newTotalPrice) + " VNĐ");
    });

    // Hàm định dạng số tiền
    function number_format(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
});
</script>
