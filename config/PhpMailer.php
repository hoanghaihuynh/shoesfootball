<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Đường dẫn đến Composer autoload hoặc nơi bạn lưu PHPMailer

function sendOrderConfirmation($email, $name, $orderID, $totalAmount) {
    $mail = new PHPMailer(true);
    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Hoặc SMTP của email bạn
        $mail->SMTPAuth = true;
        $mail->Username = 'hau69710@gmail.com'; // Email của bạn
        $mail->Password = 'zpoj ijzf duuz dauz'; // Mật khẩu ứng dụng
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Địa chỉ người gửi và người nhận
        $mail->setFrom('hau69710@gmail.com', 'ShoesFootball'); // Thay bằng thông tin shop của bạn
        $mail->addAddress($email, $name);

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'Xác nhận đơn hàng #' . $orderID;
        $mail->Body    = "
            <h2>Xin chào $name,</h2>
            <p>Cảm ơn bạn đã đặt hàng tại <strong>Shoes Football</strong>. Đơn hàng của bạn đã được xác nhận.</p>
            <p><strong>Mã đơn hàng:</strong> $orderID</p>
            <p><strong>Tổng số tiền:</strong> " . number_format($totalAmount, 0, ',', '.') . " VNĐ</p>
            <p>Chúng tôi sẽ giao hàng đến bạn trong thời gian sớm nhất.</p>
            <p>Trân trọng,</p>
            <p>Shoes Football Team</p>
        ";

        // Gửi email
        $mail->send();
        echo 'Email thông báo đã được gửi.';
    } catch (Exception $e) {
        echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
    }
}

?>