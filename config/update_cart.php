<?php
require_once('../config/database.php');
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["quantities"])) {
    $email = $_SESSION["user"];
    $quantities = $_POST["quantities"];

    foreach ($quantities as $productId => $quantity) {
        $quantity = intval($quantity);
        // Kiểm tra số lượng hợp lệ
        if ($quantity > 0 && $quantity <= 99) {
            $stmt = $conn->prepare("UPDATE `cart` SET `soluong` = :quantity WHERE `email` = :email AND `id` = :productId");
            $stmt->execute([
                ':quantity' => $quantity,
                ':email' => $email,
                ':productId' => $productId
            ]);
        } else {
            echo "Số lượng phải từ 1 đến 99.";
            exit();
        }
    }

    // Thành công, trả về thông báo
    echo "Cập nhật giỏ hàng thành công!";
}
?>
