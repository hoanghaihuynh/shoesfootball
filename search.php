<?php
  require_once('./config/database.php');
  include_once('./components/header.php');
  include_once('./components/nav.php');
   
?>

<!-- Start Gallery  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Kết Quả</h1>
                    <p>Sau đây là những kết quả phù hợp với từ khoá của bạn.</p>
                </div>
            </div>
        </div>


        <div class="row special-list">

            <?php 
                                        $danhm = $_GET['tukhoa'];
                                        $select = $_GET['subcategory_id'];
                                $query = $conn->query("SELECT * FROM `products` WHERE `nameProduct` LIKE '%$danhm%' OR `danhmuc` LIKE '%$select%'");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                    //tìm kiếm sản phẩm có tên có phần giống tên đã nhập
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
</div>
<!-- End Gallery  -->



<?php
include_once('./components/footer.php');
?>