<?php
       // Đường dẫn đầy đủ đến tệp JSON usercart
$jsonFilePath = '../adminstrator/dist/json/usercart1.json';

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

// Tiếp tục xử lý hoặc hiển thị giá trị $cartSubtotal theo nhu cầu

?>
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
                            include "./model/user.php";
                            session_start();
                            ob_start();
    // Kiểm tra xem có session role và role có giá trị 2 không
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
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="webpage.php">Home</a></li>
                            <li><a href="ListOfProducts.php">Products</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shopping-item">
                        <form action="search.php" method="post" target="_blank">
                            <input type="text" name="search_query" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
$conn = connectdb();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST["search_query"];

    // Chuyển hướng đến trang search.php với tham số tìm kiếm
    header("Location: search.php?query=" . urlencode($search_query));
    exit();
}
?>
