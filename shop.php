<?php
  require_once('./config/database.php');
  include_once('./components/header.php');
  include_once('./components/nav.php');
   $danhmuc = $_GET['danhmuc'];
?>

<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">

                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Danh mục</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                <?php 
                                $query = $conn->query("SELECT * FROM `danhmuc`");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    //get tất cả sản phẩm
                                ?>
                                                <li><a href="shop.php?danhmuc=<?php echo ''.$row1["danhmucchinh"]?>"><?php echo ''.$row1["tendanhmuc"]?>
                                                    </a></li>
                                                <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Hiển thị tất cả kết quả</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <?php 
                    if($danhmuc!=""&&$danhmuc!=null){
                                $query = $conn->query("SELECT * FROM `products`  WHERE `danhmuc` = '$danhmuc' ORDER BY `id` DESC");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
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
                    <?php }
                    }else{
                        
                         $query = $conn->query("SELECT * FROM `products`");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
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
                    <?php }}?>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<!-- Footer Section Begin -->
<?php
include_once('./components/footer.php');
?>