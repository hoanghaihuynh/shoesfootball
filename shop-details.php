<?php
  require_once('./config/database.php');
  include_once('./components/header.php');
  include_once('./components/nav.php');
   $id = $_GET['id'];$email = $_SESSION["user"];
   $query = $conn->query("SELECT * FROM `products` WHERE `id` = '$id'");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                    //lấ thông tin của sản phẩm có id như trên
                                ?>
<!-- Shop Details Section Begin -->

<section class="shop-details">
    <form method="post" action="dao/addCart.php">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./home.php">Trang chủ</a>
                            <a href="./shop.php?danhmuc=">Cửa hàng</a>
                            <span>Chi tiết sản phẩm</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?php echo ''.$row1["image"]?>">
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img style="max-height:400px" src="<?php echo ''.$row1["image"]?>" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4><?php echo ''.$row1["nameProduct"]?></h4>
                            <!-- <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span> - <?php 
                                $qty= 0;
                                $query = $conn->query("SELECT * FROM `binhluan` WHERE `sanpham` = '$id'");
                                while($row134 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    $qty += 1;
                                }
                                echo $qty;
                                // ?> bình luận</span>
                            </div> -->
                            <h3><?php echo ''.number_format($row1["price"])?>
                                <span><?php echo ''.number_format($row1["giagoc"])?></span>
                            </h3>
                            <input type="hidden" name="idsp" value="<?php echo ''.$row1["id"]?>">

                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="quanty">
                                    </div>
                                </div>
                                <button type="submit" name="addCart" class="primary-btn">Thêm vào giỏ hàng</button>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Thông tin chi
                                        tiết</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Đánh giá</a>
                                </li> -->

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note"><?php echo ''.$row1["chitiet"]?></p>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="blog-single-main">
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="comments">

                                                        <h3 class="comment-title">Bình Luận (<?php 
                                $qty= 0;
                                $query = $conn->query("SELECT * FROM `binhluan` WHERE `sanpham` = '$id'");
                                while($row134 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    //lái danh sách bình luận của sản phẩm nài
                                    $qty += 1;
                                }
                                echo $qty;
                                ?>)</h3>
                                                        <!-- Single Comment -->
                                                        <?php 
                                $query = $conn->query("SELECT * FROM `binhluan` WHERE `sanpham` = '$id'");
                                while($row13 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                                        <div class="single-comment">
                                                            <img style="width:80px;height:80px"
                                                                src="https://i.ibb.co/Hdx4PFg/75561455-3136386279767372-281513189034688512-n.jpg"
                                                                alt="#">
                                                            <div class="content">
                                                                <h4><?php echo ''.$row13["name"]?>
                                                                    <span><?php echo ''.$row13["thoigian"]?></span>
                                                                </h4>
                                                                <p><?php echo ''.$row13["noidung"]?></p>

                                                            </div>
                                                        </div>
                                                        <?php }?>
                                                        <!-- End Single Comment -->

                                                        <!-- End Single Comment -->
                                                    </div>
                                                </div>
                                                <?php 
                                $qty= 0;
                                $query = $conn->query("SELECT * FROM `donhang` WHERE `idsp` = '$id' AND `email` = '$email'");
                                while($row134 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    //kiểm tra bạn đã mua sản phẩm nài hai chưa, nếu đã mua thì có thể đánh giá
                                    $qty += 1;
                                }
                                if($qty>0){
                                ?>
                                                <div class="col-12">
                                                    <div class="reply">
                                                        <div class="reply-head">
                                                            <h2 class="reply-title">Để Lại Đánh Giá Của Bạn</h2>
                                                            <!-- Comment Form -->
                                                            <form method="post" action="dao/addCmt.php">
                                                                <div>
                                                                    <input type="hidden" name="id"
                                                                        value="<?php echo $id?>">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <textarea name="message"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group button">
                                                                            <button type="submit" name="addCmt"
                                                                                class="btn">Đăng</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <!-- End Comment Form -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Sản phẩm liên quan</h3>
            </div>
        </div>
        <div class="row">
            <?php 
                                $query = $conn->query("SELECT * FROM `products` limit 4");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                    //lấ thông tin của sản phẩm có id như trên
                                ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo $row1['image']?>">
                        <!-- <ul class="product__hover">
                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                </ul> -->
                    </div>
                    <div class="product__item__text">
                        <h6><?php echo $row1['nameProduct']?></h6>
                        <form method="post" action="dao/addCart.php">
                            <input type="hidden" name="idsp" value="<?php echo ''.$row1["id"]?>">
                            <input type="hidden" value="1" name="quanty">
                            <a><button type="submit" name="addCart" class="add-cart">+ Thêm vào giỏ
                                    hàng</button>
                            </a>
                        </form>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h5><?php echo number_format($row1['price'])?> VNĐ</h5>
                        <div class="product__color__select">
                            <label for="pc-4">
                                <input type="radio" id="pc-4">
                            </label>
                            <label class="active black" for="pc-5">
                                <input type="radio" id="pc-5">
                            </label>
                            <label class="grey" for="pc-6">
                                <input type="radio" id="pc-6">
                            </label>
                        </div>
                    </div><a href="<?php echo $site_domain?>/shop-details.php?id=<?php echo $row1['id']?>"
                        style="color:blue;">Xem chi
                        tiết</a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>

</section>
<!-- Related Section End -->
<?php }?>


</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quantityInput = document.querySelector('input[name="quanty"]');
        var form = document.querySelector('form[action="dao/addCart.php"]');
        var increaseBtn = document.querySelector('.pro-qty .inc');
        var decreaseBtn = document.querySelector('.pro-qty .dec');

        // Increase quantity by 10
        increaseBtn.addEventListener('click', function (event) {
            event.preventDefault();
            var quantityValue = parseInt(quantityInput.value, 10) || 0;
            quantityInput.value = quantityValue + 0;
        });

        // Decrease quantity by 10
        decreaseBtn.addEventListener('click', function (event) {
            event.preventDefault();
            var quantityValue = parseInt(quantityInput.value, 10) || 0;
            quantityInput.value = Math.max(quantityValue - 0, 1); // Ensure quantity doesn't go below 1
        });

        form.addEventListener('submit', function (event) {
            var quantityValue = parseInt(quantityInput.value, 10);

            if (isNaN(quantityValue) || quantityValue < 1) {
                alert('Số lượng nhỏ nhất là 1.');
                event.preventDefault(); // Prevent form submission
            } else if (quantityValue > 99) {
                alert('Số lượng không được lớn hơn 99.');
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>


<!-- Footer Section Begin -->
<?php
include_once('./components/footer.php');
?>