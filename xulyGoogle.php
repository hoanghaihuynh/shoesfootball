<?php
require_once 'vendor/autoload.php';

// init configuration
$clientID = '460428538946-l4ohfn4fml72n4v9tmiiq5etpfe6f97m.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost:8080/shoesfootball//home.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


$url = $client->createAuthUrl();

// authenticate code from Google OAuth Flow
// xulyGoogle.php
if (isset($_GET['code'])) {
    // Lấy token truy cập từ Google
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);
        
        // Lấy thông tin tài khoản Google
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;
        $name = $google_account_info->name;

        // Kiểm tra xem email này tồn tại trong CSDL chưa
        $query = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([$email]);
        
        if ($query->rowCount() == 1) {
            // Đã có tài khoản => Đăng nhập thành công
            $_SESSION["user"] = $email;
            header('Location: home.php');
            exit;
        } else {
            // Chưa có tài khoản => Thêm tài khoản vào CSDL
            $insert = $conn->prepare("INSERT INTO user (name, email, password, phanquyen) VALUES (?, ?, NULL, 0)");
            $insert->execute([$name, $email]);
            $_SESSION["user"] = $email;
            header('Location: home.php');
            exit;
        }
    } else {
        echo 'Có lỗi xảy ra khi xác thực với Google!';
    }
}

?>