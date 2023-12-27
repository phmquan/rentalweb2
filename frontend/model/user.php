<?php
require_once('config_webpage.php');
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
    // $stmt->close();
    // mysqli_close($conn);
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
    $stmt = $conn->prepare("SELECT fullname, dayofbirth, email,PhoneNumber,address FROM user WHERE email = ? OR account = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userInfo = $result->fetch_assoc();
    $stmt->close();
    $conn->close();

    return $userInfo;
}

function execute($sql){
    
    //open connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    //mysqli_set_charset($conn,'utf-8');

    //query
    mysqli_query($conn, $sql);

    //close connection
    mysqli_close($conn);
}

function execute_result($sql){

    $result = null;
    //open connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    //$conn = mysqli_connect('127.0.0.1', 'root', '', 'DVD_WEBRENTAL');
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    //mysqli_set_charset($conn,'utf-8');

    //query
    $resultset = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($resultset)) {
        $result[]=$row;
    }
    
    
    //close connection
    mysqli_close($conn);

    return $result;

}




function find($email) {
    $result = null;
    //open connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    //mysqli_set_charset($conn,'utf-8');

    //query

    $sql = "SELECT id FROM USER WHERE ACCOUNT = '$email'";
   
    // Thực hiện truy vấn để lấy user_id dựa trên địa chỉ email
    $result = mysqli_query($conn, $sql);
    return $result;
}

function doit() {
    // Đọc nội dung từ user_data.json
    $userDataFilePath = '../adminstrator/dist/json/user_data.json';
    $userData = json_decode(file_get_contents($userDataFilePath), true);

    foreach ($userData as $user) {
        $emailToFind = $user['name'];
        echo json_encode(['status' =>  $user['name']]);
        $user_id = find($emailToFind);

        if ($user_id !== null) {
            $sql2 = "INSERT INTO User_cart (user_id) VALUES ('$user_id')";
            // Gọi hàm execute và kiểm tra kết quả
            execute($sql2);
        }
    }
}
// Lấy id mới nhất vừa tạo trong bảng INVOICE
function getLastInsertedId() {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE); // Biến kết nối tới CSDL, hãy thay thế nó bằng biến kết nối của bạn
    // Sử dụng hàm mysqli_insert_id để lấy id mới nhất được tạo ra trong kết nối hiện tại
    $lastId = mysqli_insert_id($conn);

    return $lastId;
}


?>


