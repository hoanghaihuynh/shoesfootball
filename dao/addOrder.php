<?php
require_once('../config/database.php');
require_once('../config/PhpMailer.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_SESSION["user"];
$magiamgia = $_GET['magiamgia'];
$magiam = $_GET['magiam'];
$users_name = $_POST["kh_ten"];
$diachis = $_POST["kh_diachi"];
$kh_dienthoai = $_POST["kh_dienthoai"];
$kh_note = $_POST["note"];

function rand_string($length) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }
    return $str;
}

$sqlu = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sqlu);
$users = $result->fetch(PDO::FETCH_ASSOC);

$users_money = $users['money'];

if (isset($_POST["addOrder"])) {
    $query = $conn->query("SELECT * FROM `cart` WHERE `email` = '$email'");
    while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
        $madon = "SHOESFOOTBALL_" . rand_string(5);
        $idS = $row1['id'];
        $idsp = $row1['idsp'];
        $nameS = $row1['name'];
        $imageS = $row1['image'];
        $priceS = max(0, $row1['price']);
        $format = "d/m/y G:i:s";
        $thoigian = date($format, time());
        $soluongS = $row1['soluong'];
        $tongtienS = max(0, $row1['tongtien'] - $magiamgia);
        $lienket = $row1['lienket'];

        // Đảm bảo $thoihan được khởi tạo
        $thoihan = "Chưa xác định"; // Hoặc giá trị mặc định khác

        $sql = "INSERT IGNORE INTO donhang (madonhang,tennguoimua,email,name,image,price,trangthai,thoihan,soluong,tongtien,lienket,idsp,thoigian,diachi,dienthoai,payment_method) 
                VALUES ('$madon','$users_name','$email','$nameS','$imageS','$priceS','Đã Đặt Hàng','$thoihan','$soluongS','$tongtienS','$lienket','$idsp','$thoigian','$diachis','$kh_dienthoai','COD')";
        if ($conn->query($sql)) {
            $delete = "DELETE FROM `cart` WHERE `id` = '$idS'";
            $conn->query($delete);

            // Gửi thông báo Telegram
            $token = "6643393109:AAFECfPHV3eeXwNFbYmrOq-CMTu_SGT5n_4";
            $chat_id = "-4004632539";
            $my_text = $users_name . " Vừa Mua 1 Sản Phẩm Có Giá Là : " . $tongtienS . " VNĐ, Với Mã Đơn Hàng : " . $madon;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($my_text),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            // Gửi email thông báo
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'hau69710@gmail.com';
                $mail->Password = 'zpoj ijzf duuz dauz';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('your_email@example.com', 'ShoesFootball');
                $mail->addAddress($email, $users_name);

                $mail->isHTML(true);
                $mail->Subject = 'Thank you!';
                $mail->Body = "
                    <h1>Cảm ơn bạn đã mua hàng tại ShoesFootball!</h1>
                    <p>Đơn hàng của bạn với mã <strong>$madon</strong> đã được đặt thành công.</p>
                    <p>Chi tiết đơn hàng:</p>
                    <ul>
                        <li>Sản phẩm: $nameS</li>
                        <li>Số lượng: $soluongS</li>
                        <li>Tổng tiền: $tongtienS VNĐ</li>
                    </ul>
                    <p>Chúng tôi sẽ liên hệ với bạn để giao hàng sớm nhất có thể.</p>
                ";

                $mail->send();
            } catch (Exception $e) {
                error_log("Không thể gửi email: " . $mail->ErrorInfo);
            }
        } else {
            echo '<script>alert("Bạn đã đặt hàng thất bại!")</script>';
            echo "<script>history.back();</script>";
        }
    }
    echo '<script>alert("Bạn Đã Đặt Hàng Thành Công!")</script>';
    echo "<script>window.location = '$site_domain/donhang.php'</script>";
}
?>
