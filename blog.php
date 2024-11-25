<?php
  require_once('./config/database.php');
  include_once('./components/header.php');
  include_once('./components/nav.php');
   
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-blog set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Tin tức</h2>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <?php 
                                $query = $conn->query("SELECT * FROM `tintuc`");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="<?php echo $row1['image']?>"></div>
                    <div class="blog__item__text">
                        <span><img src="img/icon/calendar.png" alt=""><?php echo $row1['date']?></span>
                        <h5><?php echo $row1['title']?></h5>
                        <a href="<?php echo $site_domain?>/blog-details.php?id=<?php echo $row1['id']?>">Xem thêm</a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php
include_once('./components/footer.php');
?>