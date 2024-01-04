<?php
include('../frontend/model/user.php');

// Xử lý các yêu cầu CRUD bằng PHP
$action = $_POST['action'];


if ($action == 'ajaxcheckout') {
   // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Lấy các giá trị từ dữ liệu
   $order_total = $data['cartSubtotal'];

   // Đọc nội dung từ usercart.json
   $jsonFilePath = '../adminstrator/dist/json/usercart.json';
   $userCartData = json_decode(file_get_contents($jsonFilePath), true);

   
   foreach ($userCartData as $item) {
       $dvd_id = $item['dvd_id'];
       $dvd_title = $item['title'];
       $dvd_price = $item['price'];
       $quantity = $item['quantity'];
       $productimage = $item['productImage'];

        // Thực hiện truy vấn cập nhật thông tin DVD
        $sql = "INSERT INTO User_cart ( user_id, dvd_id, dvd_title, dvd_price, quantity, productimage, order_total, created_at, updated_at)
        VALUES ('1','$dvd_id', '$dvd_title', '$dvd_price', '$quantity', '$productimage', '$order_total', NOW(), NOW())";

        // Gọi hàm execute và kiểm tra kết quả
        execute($sql);
    }
    
    $jsonFilePath1 = '../adminstrator/dist/json/usercart.json';
    $file1 = fopen($jsonFilePath1, 'w');
    fwrite($file1, '{}');
    fclose($file1);

}

if ($action == 'ajaxcheckoutend') {

    $jsonFilePath13 = '../adminstrator/dist/json/user_data.json';
    $userCartData1 = json_decode(file_get_contents($jsonFilePath13), true);
    foreach ($userCartData1 as $item) {
        $account = $item['name'];
        $role = $item['role'];
    }
    // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Lấy các giá trị từ dữ liệu
    $orderTotal = $data['cartSubtotal'];
    $discount = $data['discount'];
    $fullName = $data['fullName'];
    $email = $data['email'];
    $phoneNumber = $data['phoneNumber'];
    $address = $data['address'];
    $note = 'Special instructions'; 
    $status = 'Processing';
    $discount = $data['discount'];


    // Kiểm tra xem email đã tồn tại trong bảng user hay chưa
    $sqlCheckUser = "SELECT id FROM user WHERE (account = '$account' OR email = '$account' )";
    $result = execute_Result($sqlCheckUser);

    // Nếu email tồn tại, lấy user_id, ngược lại thêm mới user và lấy user_id
    if ($result && count($result) > 0) {
        $user_id = $result[0]['id'];
    } 
    // Thực hiện thêm dữ liệu vào bảng INVOICE
    $sqlInvoice = "INSERT INTO INVOICE (user_id, fullname, email, phone_number, address, order_date, note, status, discount, total_money)
    VALUES ($user_id, '$fullName', '$email', '$phoneNumber', '$address', NOW(),'$note', '$status', '$discount', '$orderTotal')";
    // Gọi hàm execute và kiểm tra kết quả
    execute($sqlInvoice);

    // Lấy id mới vừa tạo trong bảng INVOICE
    $sqlCheckUser = "SELECT MAX(id) AS max_id FROM INVOICE;";
    $result = execute_Result($sqlCheckUser);
    if ($result && count($result) > 0) {
        $order_id = $result[0]['max_id'];
    } 
    // Hoặc sử dụng echo
    echo $order_id;

    // Thực hiện thêm dữ liệu vào bảng Invoice_Detail (lặp qua từng sản phẩm trong giỏ hàng)
    $jsonFilePath = '../adminstrator/dist/json/usercart1.json';
    $userCartData = json_decode(file_get_contents($jsonFilePath), true);
    
        
    foreach ($userCartData as $item) {
        $product_id = $item['dvd_id'];
        $price = $item['price'];
        $num = $item['quantity'];
        $totalMoney = $item['price'] * $item['quantity'];

        // Thực hiện thêm dữ liệu vào bảng Invoice_Detail
        $sqlInvoiceDetail = "INSERT INTO Invoice_Detail (order_id,product_id, price, num, total_money)
                            VALUES ('$order_id','$product_id', '$price', '$num', '$totalMoney')";
        // Thực hiện các bước thêm dữ liệu vào bảng Invoice_Detail ở đây (sử dụng prepare và bindParam)
        // Gọi hàm execute và kiểm tra kết quả
        execute($sqlInvoiceDetail);

    }
        $jsonFilePath1 = '../adminstrator/dist/json/usercart1.json';
        $file1 = fopen($jsonFilePath1, 'w');
        fwrite($file1, '{}');
        fclose($file1);
        // Kết nối CSDL và thực hiện các bước thêm dữ liệu vào bảng INVOICE (sử dụng prepare và bindParam)
    
        // Sau khi thêm dữ liệu, bạn có thể chuyển hướng hoặc hiển thị thông báo thành công
}
?>