<?php
require_once('./config/database.php');

if (isset($_SESSION["user"])) {
    // Nếu user đã đăng nhập thì chuyển đến home
    header('Location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký và Đăng nhập</title>
    <link rel="stylesheet" href="./main.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html {
            color: #333;
            font-size: 62.5%;
            font-family: 'Open Sans', sans-serif;
        }
        .main {
            background: #f1f1f1;
            min-height: 100vh;
            display: flex;
            justify-content: center;
        }
        .form {
            width: 360px;
            min-height: 100px;
            padding: 32px 24px;
            text-align: center;
            background: #fff;
            border-radius: 2px;
            margin: 24px;
            align-self: center;
            box-shadow: 0 2px 5px 0 rgba(51, 62, 73, 0.1);
        }
        .form .heading {
            font-size: 2rem;
        }
        .form .desc {
            text-align: center;
            color: #636d77;
            font-size: 1.6rem;
            font-weight: lighter;
            line-height: 2.4rem;
            margin-top: 16px;
            font-weight: 300;
        }
        .form-group {
            display: flex;
            margin-bottom: 16px;
            flex-direction: column;
        }
        .form-label,
        .form-message {
            text-align: left;
        }
        .form-label {
            font-weight: 700;
            padding-bottom: 6px;
            line-height: 1.8rem;
            font-size: 1.4rem;
        }
        .form-control {
            height: 40px;
            padding: 8px 12px;
            border: 1px solid #b3b3b3;
            border-radius: 3px;
            outline: none;
            font-size: 1.4rem;
        }
        .form-control:hover {
            border-color: #1dbfaf;
        }
        .form-submit {
            outline: none;
            background-color: #1dbfaf;
            margin-top: 12px;
            padding: 12px 16px;
            font-weight: 600;
            color: #fff;
            border: none;
            width: 100%;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
        }
        .form-submit:hover {
            background-color: #1ac7b6;
        }
        .form-toggle {
            margin-top: 12px;
            font-size: 1.4rem;
            color: #1dbfaf;
            cursor: pointer;
            text-decoration: underline;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<div class="main">
    <!-- Form đăng ký -->
    <form action="" method="POST" class="form hidden" id="form-register">
        <h3 class="heading">Thành viên đăng ký</h3>
        <p class="desc">Đăng ký để có thể mua sắm những sản phẩm chất lượng! ❤️</p>
        <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Hoàng Hậu" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="emailReg" class="form-label">Email</label>
            <input id="emailReg" name="emailReg" type="email" placeholder="VD: email@domain.com" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="passReg" class="form-label">Mật khẩu</label>
            <input id="passReg" name="passReg" type="password" placeholder="Nhập mật khẩu" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword" class="form-label">Nhập lại mật khẩu</label>
            <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Nhập lại mật khẩu" class="form-control" required>
        </div>
        <button class="form-submit" name="reg">Đăng ký</button>
        <p class="form-toggle" onclick="toggleForm('login')">Đã có tài khoản? Đăng nhập</p>
    </form>

    <!-- Form đăng nhập -->
    <form action="" method="POST" class="form" id="form-login">
        <h3 class="heading">Đăng nhập</h3>
        <p class="desc">Cùng nhau mua sắm tại ShoesFootball! ❤️</p>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" placeholder="VD: email@domain.com" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control" required>
        </div>
        <button class="form-submit" name="login">Đăng nhập</button>
        <p class="form-toggle" onclick="toggleForm('register')">Chưa có tài khoản? Đăng ký</p>
    </form>
</div>

<script>
    function toggleForm(form) {
        const registerForm = document.getElementById('form-register');
        const loginForm = document.getElementById('form-login');

        if (form === 'login') {
            registerForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
        } else {
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
        }
    }
</script>
</body>
</html>

<?php
if (isset($_POST['reg'])) {
    $namep = trim($_POST['fullname']);
    $emailq = trim($_POST['emailReg']);
    $passs = trim($_POST['passReg']);
    $confirmPass = trim($_POST['confirmPassword']);

    if ($passs !== $confirmPass) {
        echo '<script>alert("Mật khẩu không khớp!");</script>';
    } else {
        $sqle = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $sqle->execute([$emailq]);
        if ($sqle->fetch()) {
            echo '<script>alert("Email đã tồn tại!");</script>';
        } else {
            $sql = $conn->prepare("INSERT INTO user (name, email, password, phanquyen) VALUES (?, ?, ?, 0)");
            if ($sql->execute([$namep, $emailq, $passs])) {
                echo '<script>alert("Đăng ký thành công!");window.location = "index.php";</script>';
            } else {
                echo '<script>alert("Đăng ký thất bại!");</script>';
            }
        }
    }
}

if (isset($_POST['login'])) {
    $emailq = trim($_POST['email']);
    $passs = trim($_POST['password']);

    if ($emailq && $passs) {
        $query = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $query->execute([$emailq, $passs]);
        if ($query->rowCount() == 1) {
            $_SESSION["user"] = $emailq;
            echo '<script>alert("Đăng nhập thành công!");window.location = "home.php";</script>';
        } else {
            echo '<script>alert("Sai tài khoản hoặc mật khẩu!");</script>';
        }
    } else {
        echo '<script>alert("Không được để trống!");</script>';
    }
}
?>
