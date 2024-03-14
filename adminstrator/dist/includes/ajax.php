<?php
// includes/ajax.php
require_once('../database/config.php');
require_once('../database/dbhelper.php');



// Xử lý các yêu cầu CRUD bằng PHP
$action = $_POST['action'];

if ($action == 'adddvd') {
   // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Lấy các giá trị từ dữ liệu
   $category_id = $data['category_id'];
   $title = $data['title'];
   $price = $data['price'];
   $quantity = $data['quantity'];
   $description = $data['description'];
   $productimage = $data['productimage'];
   $discount_id = $data['discount_id'];

   // Thực hiện truy vấn cập nhật thông tin DVD
   $sql = "INSERT INTO DVD (category_id, title, price, quantity, description, productimage, discount_id, created_at, updated_at)
        VALUES ($category_id, '$title', $price, $quantity, '$description', '$productimage', $discount_id, NOW(), NOW())";


   // Gọi hàm execute và kiểm tra kết quả
   if (execute($sql)) {
       echo json_encode(['status' => 'success']);
   } else {
       echo json_encode(['status' => 'error']);
   }
}

if ($action == 'editdvd') {
   // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Lấy các giá trị từ dữ liệu
   $id = $data['id'];
   $category_id = $data['category_id'];
   $title = $data['title'];
   $price = $data['price'];
   $quantity = $data['quantity'];
   $description = $data['description'];
   $productimage = $data['productimage'];
   $discount_id = $data['discount_id'];

   // Thực hiện truy vấn cập nhật thông tin DVD
   $sql = "UPDATE DVD SET category_id = $category_id, title = '$title', price = $price, quantity = $quantity, 
           description = '$description', productimage = '$productimage', discount_id = $discount_id , updated_at = NOW()
           WHERE id = $id";

   // Gọi hàm execute và kiểm tra kết quả
   if (execute($sql)) {
       echo json_encode(['status' => 'success']);
   } else {
       echo json_encode(['status' => 'error']);
   }
}


if ($action == 'editdvdcategory') {
   // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Lấy các giá trị từ dữ liệu
   $id = $data['id'];
   $name = $data['name'];

   // Thực hiện truy vấn cập nhật thông tin DVD Category
   $sql = "UPDATE DVDCategory SET name = '$name' WHERE id = $id;";
   
   if (execute($sql)) {
      echo json_encode(['status' => 'success']);
   } else {
         echo json_encode(['status' => 'error']);
   }
};

if ($action == 'adddvdcategory') {
   // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Lấy các giá trị từ dữ liệu
   $name = $data['name'];

   // Thực hiện truy vấn cập nhật thông tin DVD Category
   $sql = "INSERT INTO DVDCategory (name) VALUES ('$name')";
   
   if (execute($sql)) {
      echo json_encode(['status' => 'success']);
   } else {
         echo json_encode(['status' => 'error']);
   }
};


if ($action == 'edituser') {
   // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Lấy các giá trị từ dữ liệu
   $id = $data['id'];
   $fullname = $data['fullname'];
   $dayofbirth = $data['dayofbirth'];
   $email = $data['email'];
   $phoneNumber = $data['phoneNumber'];
   $address = $data['address'];
   $avatar = $data['avatar'];
   $account = $data['account'];
   $password = $data['password'];
   $role_id = $data['role_id'];

   // Thực hiện truy vấn cập nhật thông tin người dùng
   $sql = "UPDATE USER SET
           fullname = '$fullname',
           dayofbirth = '$dayofbirth',
           email = '$email',
           PhoneNumber = '$phoneNumber',
           address = '$address',
           avartar = '$avatar',
           account = '$account',
           password = '$password',
           role_id = $role_id,
           updated_at = NOW()
           WHERE id = $id";



   if (execute($sql)) {
       echo json_encode(['status' => 'success']);
   } else {
       echo json_encode(['status' => 'error']);
   }
};



if ($action == 'adduser') {
   // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Lấy các giá trị từ dữ liệu
   $fullname = $data['fullName'];
   $dayofbirth = $data['dateOfBirth'];
   $email = $data['email'];
   $phoneNumber = $data['phoneNumber'];
   $address = $data['address'];
   $avatar = $data['avatar'];
   $account = $data['account'];
   $password = $data['password'];
   $role_id = $data['role_id'];

   // Thực hiện truy vấn cập nhật thông tin người dùng
   $sql = "INSERT INTO USER (fullname, dayofbirth, email, PhoneNumber, address, avartar, account, password, role_id, created_at, updated_at) 
      VALUES ('$fullname', '$dayofbirth', '$email', '$phoneNumber', '$address', '$avatar', '$account', '$password', $role_id, NOW(), NOW())";

   if (execute($sql)) {
       echo json_encode(['status' => 'success']);
   } else {
       echo json_encode(['status' => 'error']);
   }
};

if ($action == 'editinvoice') {
    // Lấy dữ liệu từ client
    $id = $_POST['data']['id'];
    $user_id = $_POST['data']['user_id'];
    $fullname = $_POST['data']['fullname'];
    $email = $_POST['data']['email'];
    $phone_number = $_POST['data']['phone_number'];
    $address = $_POST['data']['address'];
    $note = $_POST['data']['note'];
    $order_date = $_POST['data']['order_date'];
    $status = $_POST['data']['status'];
    $total_money = $_POST['data']['total_money'];

    // Bảo vệ chống SQL injection
    $id = intval($id);
    $user_id = intval($user_id);
    $fullname = addslashes($fullname);
    $email = addslashes($email);
    $phone_number = addslashes($phone_number);
    $address = addslashes($address);
    $note = addslashes($note);
    $order_date = addslashes($order_date);
    $status = addslashes($status);
    $total_money = intval($total_money);

    // Thực hiện câu truy vấn update
    $sql = "UPDATE INVOICE
            SET user_id = $user_id,
                fullname = '$fullname',
                email = '$email',
                phone_number = '$phone_number',
                address = '$address',
                note = '$note',
                order_date = '$order_date',
                status = '$status',
                total_money = $total_money
            WHERE id = $id";

   execute($sql);

   
   if (execute($sql)) {
      // Trả về thông báo thành công
      echo json_encode(array('status' => 'success', 'message' => 'Chỉnh sửa offer thành công.'));
  } else {
      // Trả về thông báo lỗi
      echo json_encode(array('status' => 'error', 'message' => 'Xảy ra lỗi khi chỉnh sửa offer.'));
  }
};



if ($action == 'editoffer') {
   // Lấy dữ liệu từ client
   $id = $_POST['data']['id'];
   $name = $_POST['data']['name'];
   $offerimage = $_POST['data']['offerimage'];
   $start_date = $_POST['data']['start_date'];
   $end_date = $_POST['data']['end_date'];
   $status = $_POST['data']['status'];
   $discount_percentage = $_POST['data']['discount_percentage'];

   // Bảo vệ chống SQL injection
   $id = intval($id);
   $name = addslashes($name);
   $offerimage = addslashes($offerimage);
   $start_date = addslashes($start_date);
   $end_date = addslashes($end_date);
   $status = addslashes($status);
   $discount_percentage = intval($discount_percentage);

   // Thực hiện câu truy vấn update
   $sql = "UPDATE OFFER
           SET name = '$name',
               offerimage = '$offerimage',
               start_date = '$start_date',
               end_date = '$end_date',
               status = '$status',
               discount_percentage = $discount_percentage
           WHERE id = $id";


   if (execute($sql)) {
       // Trả về thông báo thành công
       echo json_encode(array('status' => 'success', 'message' => 'Chỉnh sửa offer thành công.'));
   } else {
       // Trả về thông báo lỗi
       echo json_encode(array('status' => 'error', 'message' => 'Xảy ra lỗi khi chỉnh sửa offer.'));
   }
}; 



if ($action == 'addoffer') {
   // Lấy dữ liệu từ client
   $data = $_POST['data'];

   // Bảo vệ chống SQL injection
   $data = array_map('addslashes', $data);

   // Extract individual variables
   $name = $data['name'];
   $offerimage = $data['offerImage'];
   $start_date = $data['startDate'];
   $end_date = $data['endDate'];
   $status = $data['status'];
   $discountcode = $data['discountcode'];
   $discount_percentage = intval($data['discountPercentage']);


   // Thực hiện câu truy vấn update
   $sql = "INSERT INTO OFFER (name, offerimage, start_date, end_date, status, code, discount_percentage) 
   VALUES ('$name', '$offerimage', '$start_date', '$end_date', '$status', '$discountcode', $discount_percentage)";



   if (execute($sql)) {
       // Trả về thông báo thành công
       echo json_encode(array('status' => 'success', 'message' => 'Chỉnh sửa offer thành công.'));
   } else {
       // Trả về thông báo lỗi
       echo json_encode(array('status' => 'error', 'message' => 'Xảy ra lỗi khi chỉnh sửa offer.'));
   }
}; 



if ($action == 'deletecategory') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM DVDCategory WHERE id = $id";
   execute($sql);
};
if ($action == 'deletedvd') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM DVD WHERE id = $id";
   execute($sql);
};
if ($action == 'deleteuser') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM USER WHERE id = $id";
   execute($sql);
};
if ($action == 'deleteoffer') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM OFFER WHERE id = $id";
   execute($sql);
};
if ($action == 'deleteinvoice') {
   // Xử lý xoá
   $id = $_POST['id'];
   // Delete records from the child table (invoice_detail)
   $sqlChild = "DELETE FROM Invoice_detail WHERE order_id = $id";
   execute($sqlChild);
   // Delete record from the parent table (INVOICE)
   $sqlParent = "DELETE FROM INVOICE WHERE id = $id";
   execute($sqlParent);
};
if ($action == 'deleteinvoidetail') {
   // Xử lý xoá
   $id = $_POST['id'];
   $sql = "DELETE FROM Invoice_detail WHERE id = $id";
   execute($sql);
};
?>
