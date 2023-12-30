<?php
    $jsonFilePath = '../adminstrator/dist/json/usercart1.json';
    require_once('./model/config_webpage.php');
    // Kiểm tra xem tệp JSON có tồn tại hay không
    if (file_exists($jsonFilePath)) {
        // Đọc dữ liệu từ tệp JSON
        $jsonContent = file_get_contents($jsonFilePath);
    
        // Kiểm tra xem tệp JSON có dữ liệu hay không
        if (!empty($jsonContent)) {
            $userCartData = json_decode($jsonContent, true);
            $cartSubtotal = 0; // Thêm biến để tính tổng giá trị
    
            // Hiển thị từng sản phẩm trong giỏ hàng
            foreach ($userCartData as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                // Cập nhật tổng giá trị
                $cartSubtotal += $subtotal;
            }
        } else {
            // Tệp JSON rỗng, set $cartSubtotal = 0
            $cartSubtotal = 0;
        }
    } else {
        // Tệp JSON không tồn tại, set $cartSubtotal = 0 hoặc thực hiện xử lý phù hợp
        $cartSubtotal = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
    
    <title>Checkout Page - DVDTrendy</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    </head>
  <body>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                </div>
                <div class="col-md-5">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
							<li><a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i> Cart - <?php echo '<span class="cart-amunt">$' . $cartSubtotal . '</span>'; ?>
  </a></li>
                            <?php
                            session_start();
                            ob_start();
    // Kiểm tra xem có session role có giá trị 2 không
    if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
        // Nếu role là 2, ẩn My Account và Login
        echo'<li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>';
    } else {
        // Nếu role không phải là 2, hiển thị My Account và Login
        // echo '<li><a href="register.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>';
        echo '<li><a href="login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>';
    }
    ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="shopping-item">
                    <div class="navbar-header">
                        <h1><a href="webpage.php"><img style="width: 165px; height: 50px;" src="img/brand3.png"></a></h1>
                    </div>
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <ul class="nav navbar-nav" >
                        
                        <li class="active"><a href="webpage.php">Home</a></li>
                        <li><a href="ListOfProducts.php">Products</a></li>
                        <li><a href="Offers.php">Offers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="shopping-item">
                    <form action="#">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Special Offers</h2>
                    </div>
                </div>
            </div>
        </div>
</div><br>
    <?php
// Kết nối đến cơ sở dữ liệu

// $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
// // Kiểm tra kết nối
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Truy vấn dữ liệu từ bảng offers
// $sql = "SELECT name, code, discount_percentage FROM OFFER";
// $result = $conn->query($sql);

// // Kiểm tra và hiển thị dữ liệu
// if ($result->num_rows > 0) {
//     echo '<div class="offer-container">';
//     while ($row = $result->fetch_assoc()) {
//         echo '<div class="offer">';
//         echo '❄️Coupon: <span class="offer-name">' . $row["name"] . '</span><br>';
//         echo '<div class="code-container">Code: <span class="code">' . $row["code"] . '</span><br></div>';
//         echo '<div class="discount-container">Giảm: <span class="discount-percentage">' . $row["discount_percentage"] . "%</span></div>";
//         echo "⭐------------------------⭐<br>";
//         echo '</div>';
//     }
//     echo '</div>';
// } else {
//     echo "0 results";
// }

$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng offers
$sql = "SELECT name, code, discount_percentage FROM OFFER";
$result = $conn->query($sql);

// Kiểm tra và hiển thị dữ liệu
if ($result->num_rows > 0) {
    echo '<div class="offer-container">';
    
    // Số cột bạn muốn hiển thị
    $columns = 1;
    
    echo '<div class="column">';
    
    $currentColumn = 0;

    while ($row = $result->fetch_assoc()) {
        echo '<div class="offer">';
        echo '❄️Coupon: <span class="offer-name">' . $row["name"] . '</span><br><br>';
        echo '<button class="code-container" data-clipboard-text="' . $row["code"] . '" onclick="saveAndDisplayMessage(this, \'' . $row["code"] . '\')">Code: <span class="code">' . $row["code"] . '</span><br></button>';
        echo '<div class="discount-container">Giảm: <span class="discount-percentage">' . $row["discount_percentage"] . "%</span></div>";
        echo "⭐------------------------⭐<br>";
        echo '</div>';

        // Tăng biến đếm cho cột hiện tại
        $currentColumn++;

        // Nếu đã đạt đến số lượng cột tối đa, đóng cột và mở cột mới
        if ($currentColumn == $columns) {
            echo '</div><div class="column">';
            $currentColumn = 0; // Reset biến đếm
        }
    }

    echo '</div>'; // Đóng cột cuối cùng

    echo '</div>';
} else {
    echo "0 results";
}


// Đóng kết nối
$conn->close();
?>
<script>
    function saveAndDisplayMessage(button, code) {
        // Lưu mã code vào bộ nhớ hoặc nơi bạn muốn
        var savedCode = code;
        // Lưu mã code vào localStorage
        localStorage.setItem('savedCode', code);
        // Thay đổi nội dung của button thành "saved" trong 1 giây
        button.innerHTML = 'SAVED';
        setTimeout(function () {
            // Sau 1 giây, chuyển về nội dung ban đầu
            button.innerHTML = 'Code: <span class="code">' + code + '</span><br>';
        }, 500);

        // Không cần thực hiện new ClipboardJS('.code-container') mỗi lần
        // Nếu đã tồn tại clipboard, cập nhật lại nội dung mới
        if (!button._clipboard) {
            button._clipboard = new ClipboardJS('.code-container');
        } else {
            button._clipboard.text = code;
        }

        // Thêm sự kiện sau khi copy thành công
        button._clipboard.on('success', function (e) {
            console.log('Đã sao chép vào clipboard:', e.text);
            // Có thể thực hiện các hành động khác sau khi sao chép thành công
        });
    
    }
</script>
<footer>
    <br>
    <?php require('includes/footer_webpage.php'); ?>
</footer>
        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>

        <!-- Bootstrap JS form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- jQuery sticky menu -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>

        <!-- jQuery easing -->
        <script src="js/jquery.easing.1.3.min.js"></script>

        <!-- Main Script -->
        <script src="js/main.js"></script>
        <script src="js/script_page.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
</body>

</html>