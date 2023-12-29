<?php
// addToCart.php

// Kiểm tra xem tệp JSON user_data.json có tồn tại không
$jsonFilePath = '../adminstrator/dist/json/user_data.json';

if (file_exists($jsonFilePath)) {
    // Đọc dữ liệu từ tệp JSON
    $userData = json_decode(file_get_contents($jsonFilePath), true);

    // Kiểm tra xem dữ liệu có rỗng hay không
    if (!empty($userData)) {
        // Nhận dữ liệu từ phía client
        $data = json_decode(file_get_contents('php://input'), true);

        if ($data) {
            // Đường dẫn đến tệp JSON usercart.json
            $jsonFilePathCart = '../adminstrator/dist/json/usercart.json';
            $jsonFilePathCart1 = '../adminstrator/dist/json/usercart1.json';


            // Đọc dữ liệu từ tệp JSON hiện tại (nếu có)
            $currentData = file_exists($jsonFilePathCart) ? json_decode(file_get_contents($jsonFilePathCart), true) : [];
            $currentData1 = file_exists($jsonFilePathCart1) ? json_decode(file_get_contents($jsonFilePathCart1), true) : [];

            // Thêm thông tin DVD vào mảng
            $currentData[] = [
                'dvd_id' => $data['dvd_id'],
                'title' => $data['title'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'productImage' => $data['productImage'],
                'discount' => 0
            ];

            // Ghi dữ liệu vào tệp JSON
            file_put_contents($jsonFilePathCart, json_encode($currentData, JSON_PRETTY_PRINT));
            file_put_contents($jsonFilePathCart1, json_encode($currentData, JSON_PRETTY_PRINT));

            echo 'DVD has been added to the cart successfully.';
            header('Location: cart.php');
            exit(); // Đảm bảo dừng thực thi sau khi chuyển hướng
        } else {
            echo 'Invalid data received.';
        }
    } else {
        // Chuyển hướng đến trang đăng nhập nếu dữ liệu trong user_data.json là rỗng
        header('Location: login.php');
        exit();
    }
} else {
    echo 'user_data.json not found.';
}

?>
