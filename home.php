<?php
  require_once('./config/database.php');
  require_once('./config/variable.php');
  include_once('./components/header.php');
  include_once('./components/nav.php');

   
?>

<br>

<!-- Phần sản phẩm bắt đầu -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Bán chạy nhất</li>
                    <li data-filter=".new-arrivals">Sản phẩm mới</li>
                    <li data-filter=".hot-sales">Giảm giá sốc</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            <?php 
                                $query = $conn->query("SELECT * FROM `products`");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix <?php echo $row1['filter']?>">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo $row1['image']?>">
                        <span class="label"><?php echo $row1['sale']?></span>
                      
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
                            <label for="pc-1">
                                <input type="radio" id="pc-1">
                            </label>
                            <label class="active black" for="pc-2">
                                <input type="radio" id="pc-2">
                            </label>
                            <label class="grey" for="pc-3">
                                <input type="radio" id="pc-3">
                            </label>
                        </div>
                    </div>
                    <a href="<?php echo $site_domain?>/shop-details.php?id=<?php echo $row1['id']?>"
                        style="color:blue;">Xem chi
                        tiết</a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
            <?php 
                                $query = $conn->query("SELECT * FROM `products` limit 1");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img style="max-height:400px;" src="<?php echo $row1['image']?>" alt="">
                    <div class="hot__deal__sticker">
                        <span><?php echo $row1['sale']?></span>
                        <h5><?php echo number_format($row1['price'])?> VNĐ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Giảm giá trong tuần</span>
                    <h2><?php echo $row1['nameProduct']?></h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Ngày</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Giờ</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Phút</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>Giây</p>
                        </div>
                    </div>
                    <a href="<?php echo $site_domain?>/shop-details.php?id=<?php echo $row1['id']?>"
                        class="primary-btn">Mua
                        ngay hôm nay</a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>


<?php
include_once('./components/footer.php');
?>