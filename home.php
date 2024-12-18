<?php
require_once('./config/database.php');
require_once 'vendor/autoload.php';

// init configuration
$clientID = '460428538946-l4ohfn4fml72n4v9tmiiq5etpfe6f97m.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost:8080/shoesfootball//home.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setHttpClient(new \GuzzleHttp\Client([
    'verify' => false
]));
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    // Debug nhận code
    echo '<script>console.log("Đã nhận code: " + ' . json_encode($_GET['code']) . ');</script>';

    // Bước 2: Gọi API để lấy token với code
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        echo '<script>console.log("Token nhận được: ", ' . json_encode($token) . ');</script>';

        // Kiểm tra lỗi trong token
        if (isset($token['error'])) {
            echo '<script>console.log("Lỗi khi lấy token: " + ' . json_encode($token['error_description']) . ');</script>';
            die("Error fetching token: " . $token['error_description']);
        }

        // Đặt Access Token vào client
        $client->setAccessToken($token['access_token']);
        echo '<script>console.log("Access token đã được thiết lập");</script>';

        // Bước 4: Lấy thông tin người dùng từ Google
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        echo '<script>console.log("Thông tin người dùng đã được lấy: ", ' . json_encode($google_account_info) . ');</script>';

        // Lưu thông tin vào session
        $email = $google_account_info->email;
        $name = $google_account_info->name;
        echo '<script>console.log("Email: " + ' . json_encode($email) . ' + " - Name: " + ' . json_encode($name) . ');</script>';

        // Lưu thông tin vào session
        $_SESSION["user"] = $email;

        // Thông báo đăng nhập thành công
        echo '<script>console.log("Đăng nhập thành công!");</script>';
    } catch (Exception $e) {
        // Nếu có lỗi xảy ra trong quá trình lấy thông tin người dùng
        echo '<script>console.log("Lỗi: " + ' . json_encode($e->getMessage()) . ');</script>';
        die("Error: " . $e->getMessage());
    }
} else {
    echo '<script>console.log("Không nhận được code từ Google");</script>';
}

require_once('./config/variable.php');
include_once('./components/header.php');
include_once('./components/nav.php');
include_once('./components/slider.php');
?>

<br>

<!-- Phần sản phẩm bắt đầu -->
<section class="product spad">
    <div class="container">
        <div class="row product__filter">
            <?php
            $query = $conn->query("SELECT * FROM `products`");
            while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix <?php echo $row1['filter'] ?>">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $row1['image'] ?>">
                            <span class="label"><?php echo $row1['sale'] ?></span>

                        </div>
                        <div class="product__item__text">
                            <h6><?php echo $row1['nameProduct'] ?></h6>
                            <form method="post" action="dao/addCart.php">
                                <input type="hidden" name="idsp" value="<?php echo '' . $row1["id"] ?>">
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
                            <h5><?php echo number_format($row1['price']) ?> VNĐ</h5>
                            <!-- <div class="product__color__select">
                            <label for="pc-1">
                                <input type="radio" id="pc-1">
                            </label>
                            <label class="active black" for="pc-2">
                                <input type="radio" id="pc-2">
                            </label>
                            <label class="grey" for="pc-3">
                                <input type="radio" id="pc-3">
                            </label>
                        </div> -->
                        </div>
                        <a href="<?php echo $site_domain ?>/shop-details.php?id=<?php echo $row1['id'] ?>"
                            style="color:blue;">Xem chi
                            tiết</a>
                    </div>
                </div>
            <?php } ?>
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
            while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img style="max-height:400px;" src="<?php echo $row1['image'] ?>" alt="">
                        <div class="hot__deal__sticker">
                            <span><?php echo $row1['sale'] ?></span>
                            <h5><?php echo number_format($row1['price']) ?> VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Giảm giá trong tuần</span>
                        <h2><?php echo $row1['nameProduct'] ?></h2>
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
                        <a href="<?php echo $site_domain ?>/shop-details.php?id=<?php echo $row1['id'] ?>"
                            class="primary-btn">Mua
                            ngay hôm nay</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php
include_once('./components/footer.php');
?>