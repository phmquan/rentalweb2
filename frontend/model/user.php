<?php
require_once('../adminstrator/dist/database/config.php');
function checkuser($username, $password){
    $conn = connectdb();
   
    
    // Sử dụng prepared statement để tránh SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE (account=? OR email=?) AND password=?");
    $stmt->bind_param("sss", $username, $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    // Fetch tất cả kết quả vào mảng
    $kq = $result->fetch_all(MYSQLI_ASSOC);

    // Kiểm tra xem có dữ liệu trả về hay không
    if (!empty($kq)) {
        return $kq[0]["role_id"];
    } else {
        return false; // Hoặc giá trị mặc định nếu không tìm thấy
    }

    // Đóng kết nối (bạn có thể đặt ở cuối hàm hoặc khi không sử dụng nữa)
    $stmt->close();
    mysqli_close($conn);
}
function connectdb() {
    // Khi nào dùng thì đổi lại config này cho thg Quân
    //$conn = new mysqli('localhost', 'root', '', 'web_dvdrental');
    
    // Config này cho Triết
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getUserInformation($username) {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT fullname, dayofbirth, email,PhoneNumber,address FROM user WHERE email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userInfo = $result->fetch_assoc();
    $stmt->close();
    $conn->close();

    return $userInfo;
}
?>

