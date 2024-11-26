<?php
require_once('./config/database.php');
if (isset($_SESSION["user"])) {
    //nếu user đã đăng nhập thì chuyển đến home
    header('Location: home.php');
}
?>

<html>

<head>
    <title> <?php echo $site_tenweb ?></title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background: #f1f1f1;
            /* background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e); */
        }

        .main {
            width: 350px;
            height: 600px;
            overflow: hidden;
            /* background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover; */
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 5px 0 rgba(51, 62, 73, .1);
        }

        #chk {
            display: none;
        }

        .signup {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .title {
            color: #000000;
            font-size: 2em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }

        input {
            width: 60%;
            height: 35px;
            /* background: #e0dede; */
            justify-content: center;
            display: flex;
            margin: 5px auto;
            padding: 10px;
            border: 1px solid #b3b3b3;
            outline: none;
            border-radius: 3px;
        }

        button {
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #1dbfaf;
            ;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }

        button:hover {
            background: #1ac7b6;
        }

        .login {
            height: 460px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;
        }

        .login label {
            font-size: 2rem;
            color: #000000;
            transform: scale(.6);
        }

        #chk:checked~.login {
            transform: translateY(-500px);
        }

        #chk:checked~.login label {
            transform: scale(1);
        }

        #chk:checked~.signup label {
            transform: scale(.6);
        }

        .toast-notification {
            position: fixed;
            text-decoration: none;
            z-index: 999999;
            max-width: 300px;
            background-color: #fff;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.12);
            border-radius: 4px;
            display: flex;
            padding: 10px;
            transform: translate(0, -150%);
        }

        .toast-notification .toast-notification-wrapper {
            flex: 1;
            padding-right: 10px;
            overflow: hidden;
        }

        .toast-notification .toast-notification-wrapper .toast-notification-header {
            padding: 0 0 5px 0;
            margin: 0;
            font-weight: 500;
            font-size: 14px;
            word-break: break-all;
            color: #4f525a;
        }

        .toast-notification .toast-notification-wrapper .toast-notification-content {
            font-size: 14px;
            margin: 0;
            padding: 0;
            word-break: break-all;
            color: #4f525a;
        }

        .toast-notification .toast-notification-close {
            appearance: none;
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 24px;
            line-height: 24px;
            padding-bottom: 4px;
            font-weight: bold;
            color: rgba(0, 0, 0, 0.2);
        }

        .toast-notification .toast-notification-close:hover {
            color: rgba(0, 0, 0, 0.4);
        }

        .toast-notification.toast-notification-top-center {
            transform: translate(calc(50vw - 50%), -150%);
        }

        .toast-notification.toast-notification-bottom-left,
        .toast-notification.toast-notification-bottom-right {
            transform: translate(0, 150%);
        }

        .toast-notification.toast-notification-bottom-center {
            transform: translate(calc(50vw - 50%), 150%);
        }

        .toast-notification.toast-notification-dark {
            background-color: #2d2e31;
        }

        .toast-notification.toast-notification-dark .toast-notification-wrapper .toast-notification-header {
            color: #edeff3;
        }

        .toast-notification.toast-notification-dark .toast-notification-wrapper .toast-notification-content {
            color: #edeff3;
        }

        .toast-notification.toast-notification-dark .toast-notification-close {
            color: rgba(255, 255, 255, 0.2);
        }

        .toast-notification.toast-notification-dark .toast-notification-close:hover {
            color: rgba(255, 255, 255, 0.4);
        }

        .toast-notification.toast-notification-success {
            background-color: #C3F3D7;
            border-left: 4px solid #51a775;
        }

        .toast-notification.toast-notification-success .toast-notification-wrapper .toast-notification-header {
            color: #51a775;
        }

        .toast-notification.toast-notification-success .toast-notification-wrapper .toast-notification-content {
            color: #51a775;
        }

        .toast-notification.toast-notification-success .toast-notification-close {
            color: rgba(0, 0, 0, 0.2);
        }

        .toast-notification.toast-notification-success .toast-notification-close:hover {
            color: rgba(0, 0, 0, 0.4);
        }

        .toast-notification.toast-notification-error {
            background-color: #f3c3c3;
            border-left: 4px solid #a75151;
        }

        .toast-notification.toast-notification-error .toast-notification-wrapper .toast-notification-header {
            color: #a75151;
        }

        .toast-notification.toast-notification-error .toast-notification-wrapper .toast-notification-content {
            color: #a75151;
        }

        .toast-notification.toast-notification-error .toast-notification-close {
            color: rgba(0, 0, 0, 0.2);
        }

        .toast-notification.toast-notification-error .toast-notification-close:hover {
            color: rgba(0, 0, 0, 0.4);
        }

        .toast-notification.toast-notification-verified {
            background-color: #d0eaff;
            border-left: 4px solid #6097b8;
        }

        .toast-notification.toast-notification-verified .toast-notification-wrapper .toast-notification-header {
            color: #6097b8;
        }

        .toast-notification.toast-notification-verified .toast-notification-wrapper .toast-notification-content {
            color: #6097b8;
        }

        .toast-notification.toast-notification-verified .toast-notification-close {
            color: rgba(0, 0, 0, 0.2);
        }

        .toast-notification.toast-notification-verified .toast-notification-close:hover {
            color: rgba(0, 0, 0, 0.4);
        }

        .toast-notification.toast-notification-dimmed {
            opacity: .3;
        }

        .toast-notification.toast-notification-dimmed:hover,
        .toast-notification.toast-notification-dimmed:active {
            opacity: 1;
        }

        .lbl_input {
            margin-left: 70px;

        }
    </style>
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form action="#" class="sign-in-form" method="POST">
                <label class="title" for="chk" aria-hidden="true">Đăng ký</label>

                <!-- Tên đăng nhập -->
                <label class="lbl_input" for="name">Tên đăng nhập</label>
                <input type="name" id="name" name="name" placeholder="VD: Thay Giáo Ba" required="">

                <!-- Email -->
                <label class="lbl_input" for="emailReg">Email</label>
                <input type="email" id="emailReg" name="emailReg" placeholder="abc@gmail.com" required="">

                <!-- Mật khẩu -->
                <label class="lbl_input" for="passReg">Mật khẩu</label>
                <input type="password" id="passReg" name="passReg" placeholder="messba" required="">

                <label for="confirmPassword" class="lbl_input">Nhập lại mật khẩu</label>
                <input id="confirmPassword" type="password" placeholder="Nhập lại mật khẩu" class="form-control" required>
                <div class="form-message" id="passwordError"></div>

                <button type="submit" name="reg">Đăng ký</button>
            </form>
        </div>

        <div class="login">
            <form action="#" class="sign-in-form" method="POST">
                <label class="title" for="chk" aria-hidden="true">Đăng nhập</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit" name="login">Đăng nhập </button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['reg'])) {
    $namep = $_POST['name'];
    $emailq = $_POST['emailReg'];
    $passs  = $_POST['passReg'];
    // Kiểm tra username hoặc email trong CSDL có trùng không
    if ($namep != "" && $emailq != "" && $passs != "") {
        $sqle = "SELECT * FROM user WHERE `email` = '$emailq'";
        $query_rune = $conn->query($sqle);

        if ($query_rune->fetch(PDO::FETCH_ASSOC)) {
            echo '<script>alert("Email Đã Tồn Tại!")</script>';
        } else {
            //nếu không trùng thì đk nick mới
            $sql = "INSERT IGNORE INTO user (name,email,password,phanquyen) VALUES ('$namep','$emailq','$passs','0')";
            if ($conn->query($sql)) {
                $_SESSION["user"] = $emailq;
                echo '<script>alert("Bạn Đã Đăng Ký Thành Công!");window.location = "home.php"</script>';
            } else {
                echo '<script>alert("Bạn Đã Đăng Ký Thất Bại!");</script>';
                header('location: #');
            }
        }
    } else {
        echo '<script>alert("Không Được Để Trống!");</script>';
    }

}

if (isset($_POST['login'])) {
    $emailq      = $_POST['email'];
    $passs  = $_POST['password'];
    // Kiểm tra username hoặc email trong CSDL có trùng không
    if ($emailq != "" && $passs != "") {
        $query = $conn->query("SELECT * FROM `user` WHERE `email`= '$emailq' AND `password` = '$passs'");
        $count = $query->rowCount();
        if ($count == 1) {
            $_SESSION["user"] = $emailq;
            echo '<script>alert("Bạn Đã Đăng Nhập Thành Công!");window.location = "home.php"</script>';
        } else {
            echo '<script>alert("Sai tài khoản hoặc mật khẩu!");</script>';
        }
    } else {
        echo '<script>alert("Không Được Để Trống!");</script>';
    }
}
?>