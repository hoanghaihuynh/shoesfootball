<?php
// Đảm bảo bạn đã điền đúng thông tin API PayPal
define('PAYPAL_CLIENT_ID', 'AT7LtKnpSqPHn6ZEaTpdz_HM2sggDbtK2mYMwCMDxk4Dx59bPo6EcWRoi9fCXPlsEISIoQZ_6vDf1fST');
define('PAYPAL_CLIENT_SECRET', 'EMMicJDsAZrOIAY31LP2btUYKLqNaswTJNDnNybiwmjY5SpErXWooGRdd0wHHNOjN1UO4akhrNufFVbZ');
define('PAYPAL_API_URL', 'https://api.sandbox.paypal.com'); // Thay đổi URL nếu cần, sandbox cho môi trường thử nghiệm

// Định nghĩa cấu hình PayPal
$paypalConfig = [
    'mode' => 'sandbox',
    'client_id' => 'AT7LtKnpSqPHn6ZEaTpdz_HM2sggDbtK2mYMwCMDxk4Dx59bPo6EcWRoi9fCXPlsEISIoQZ_6vDf1fST',
    'secret' => 'EMMicJDsAZrOIAY31LP2btUYKLqNaswTJNDnNybiwmjY5SpErXWooGRdd0wHHNOjN1UO4akhrNufFVbZ'
];

// Hàm lấy access token
function getAccessToken($paypalConfig) {
    $url = "https://api.sandbox.paypal.com/v1/oauth2/token";
    $headers = [
        "Authorization: Basic " . base64_encode($paypalConfig['client_id'] . ":" . $paypalConfig['secret']),
        "Content-Type: application/x-www-form-urlencoded"
    ];
    $data = "grant_type=client_credentials";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Bỏ qua xác thực SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);

if (curl_errno($ch)) {
    die('cURL Error: ' . curl_error($ch));
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpCode != 201) { // HTTP 201 là mã thành công khi tạo đơn hàng
    die("HTTP Code: $httpCode - Phản hồi: $response");
}
curl_close($ch);

// Kiểm tra phản hồi JSON
$responseArray = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Phản hồi không phải JSON hợp lệ: $response");
}

// Kiểm tra liên kết phê duyệt
if (!isset($responseArray['links'])) {
    die("Không có trường 'links' trong phản hồi: $response");
}

// Lấy liên kết phê duyệt
$approvalLink = null;
foreach ($responseArray['links'] as $link) {
    if ($link['rel'] === 'approve') {
        $approvalLink = $link['href'];
        break;
    }
}

if (!$approvalLink) {
    die("Không thể tìm thấy liên kết phê duyệt trong phản hồi: $response");
}

return $approvalLink;

}



// Hàm tạo payment
function createPayment($accessToken, $returnUrl, $cancelUrl) {
    $url = "https://api.sandbox.paypal.com/v1/payments/payment";
    $headers = [
        "Authorization: Bearer " . $accessToken,
        "Content-Type: application/json"
    ];
    $data = [
        "intent" => "sale",
        "payer" => [
            "payment_method" => "paypal"
        ],
        "transactions" => [
            [
                "amount" => [
                    "total" => "10.00",
                    "currency" => "USD"
                ],
                "description" => "Mô tả giao dịch của bạn"
            ]
        ],
        "redirect_urls" => [
            "return_url" => $returnUrl,
            "cancel_url" => $cancelUrl
        ]
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Hàm thực hiện payment
function executePayment($accessToken, $paymentId, $payerId) {
    $url = "https://api.sandbox.paypal.com/v1/payments/payment/{$paymentId}/execute";
    $headers = [
        "Authorization: Bearer " . $accessToken,
        "Content-Type: application/json"
    ];
    $data = [
        "payer_id" => $payerId
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}
// Hàm tạo đơn hàng PayPal
function createPaypalOrder($order_total, $order_details) {
    global $paypalConfig; // Sử dụng cấu hình PayPal

    $accessToken = getAccessToken($paypalConfig); // Lấy access token
    if (!$accessToken) {
        throw new Exception("Không thể lấy Access Token từ PayPal.");
    }

    $url = "https://api.sandbox.paypal.com/v2/checkout/orders";
    $headers = [
        "Authorization: Bearer " . $accessToken,
        "Content-Type: application/json"
    ];

    // Xây dựng dữ liệu đơn hàng
    $items = [];
    foreach ($order_details as $item) {
        $items[] = [
            "name" => $item['nameS'],
            "unit_amount" => [
                "currency_code" => "USD",
                "value" => $item['priceS']
            ],
            "quantity" => (string)$item['soluongS']
        ];
    }

    $data = [
        "intent" => "CAPTURE",
        "purchase_units" => [
            [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => number_format($order_total, 2, '.', ''),
                    "breakdown" => [
                        "item_total" => [
                            "currency_code" => "USD",
                            "value" => number_format($order_total, 2, '.', '')
                        ]
                    ]
                ],
                "items" => $items
            ]
        ],
        "application_context" => [
            "return_url" => "http://localhost/shoesfootball/success.php", // URL sau khi thanh toán thành công
            "cancel_url" => "http://localhost/shoesfootball/cancel.php" // URL khi huỷ thanh toán
        ]
    ];

    // Gửi yêu cầu tạo đơn hàng
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    curl_close($ch);

    $responseArray = json_decode($response, true);

    // Trả về liên kết phê duyệt nếu thành công
    if (!empty($responseArray['links'])) {
        foreach ($responseArray['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return ['approval_url' => $link['href']];
            }
        }
    }

    return $responseArray;
}

function saveOrder($conn, $order_details, $users_name, $email, $diachis, $kh_dienthoai, $payment_method) {
    foreach ($order_details as $item) {
        $madon = $item['madon'];
        $sql = "INSERT INTO donhang 
                (madonhang, tennguoimua, email, name, image, price, trangthai, thoihan, soluong, tongtien, lienket, idsp, thoigian, diachi, dienthoai, payment_method) 
                VALUES 
                (:madon, :users_name, :email, :name, :image, :price, 'Đã Đặt Hàng', NOW(), :soluong, :tongtien, :lienket, :idsp, NOW(), :diachi, :dienthoai, :payment_method)";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'madon' => $madon,
            'users_name' => $users_name,
            'email' => $email,
            'name' => $item['nameS'],
            'image' => $item['imageS'],
            'price' => $item['priceS'],
            'soluong' => $item['soluongS'],
            'tongtien' => $item['tongtienS'],
            'lienket' => $item['lienket'],
            'idsp' => $item['idsp'],
            'diachi' => $diachis,
            'dienthoai' => $kh_dienthoai,
            'payment_method' => $payment_method
        ]);
    }
}

?>

