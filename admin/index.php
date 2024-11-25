<?php
  require_once('../config/database.php');
    if(isset($_SESSION["email"])){
      //kiểm tra nếu đã login thiof chuển vào trang home
         echo "<script>
    location.href = '$site_domain/admin/home.php';
</script>";
}
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang Quản Trị</title>
    <!-- base:css -->
    <link rel="stylesheet" href="./vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="./css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="./images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <h2 style="color:pink">Trang Quản Trị</h2>
                            </div>
                            <h4>Xin chào bạn đến với trang quản trị</h4>
                            <h6 class="font-weight-light">Đăng nhập vào trang quản trị.</h6>
                            <form class="pt-3" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password" placeholder="Mật Khẩu">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit" name="submit">ĐĂNG NHẬP</button>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="./vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="./js/off-canvas.js"></script>
    <script src="./js/hoverable-collapse.js"></script>
    <script src="./js/template.js"></script>
    <script src="./js/settings.js"></script>
    <script src="./js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
<?php
        if(isset($_POST['submit'])){
          //xử lí login kiểm tra tk mk có đúng không ,nếu đúng thì chuển vào trang chủ
            $password  = $_POST['password'];
            $email      = $_POST['email'];
            $query = $conn->query("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password' AND `phanquyen` = '99'");
            $count= $query->rowCount();
            if ($count == 1) {
                 echo("<script>console.log('PHP: " . $email . "');</script>");
                $_SESSION["email"] = $email;
                //echo $_SESSION['email'];
               $message = "Đăng nhập thành công!!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("location: $site_domain/admin/home.php");
}else{
$message = "Sai tài khoản hoặc mật khẩu rồi!!!";
echo "<script type='text/javascript'>
alert('$message');
</script>";
}
}
?>